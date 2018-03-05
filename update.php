<?php

	//

	if( isSet( $_POST['nazwa'] ) ) {

		$id = isSet( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

		echo $id;

		if( $id > 0 ) {

			$sth = $dbh->prepare( 'UPDATE `cars` SET `nazwa`=:nazwa,`opis`=:opis,`id_marka`=:id_marka, `status`=:status WHERE id = :id' );

			$sth->bindParam( ':id', $id );

			//die('OK');

		} else {

			$sth = $dbh->prepare( 'INSERT INTO `cars`(`nazwa`, `opis`, `id_marka`,`status`) VALUES ( :nazwa, :opis, :id_marka, :status )' );

		}

			$sth->bindParam( ':nazwa', $_POST['nazwa'] );

		

		$sth->bindParam( ':opis', $_POST['opis'] );

		$sth->bindParam( ':id_marka', $_POST['id_marka'] );
        $sth->bindParam( ':status', $_POST['status'] );

        $sth->execute();

        header( 'location: index.php?file=list' );

        //echo $_POST['id'];

	}

	$idGet = isSet( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

	if( $idGet > 0 ) {

        $sth = $dbh->prepare( 'SELECT * FROM cars WHERE id = :id' );

		$sth->bindParam( ':id', $idGet );

        $sth->execute();

        $result = $sth->fetch();

	}

    $sth2 = $dbh->prepare( 'SELECT * FROM marka ORDER BY marka ASC' );

	$sth2->bindParam( ':id', $idGet );

    $sth2->execute();

    $marka = $sth2->fetchAll();

    $sth3 = $dbh->prepare( 'SELECT * FROM status1 ORDER BY status1 ASC' );

    $sth3->bindParam( ':id', $idGet );

    $sth3->execute();

    $status = $sth3->fetchAll();

?>





<form method="post" action="">



	<?php 

		if( $idGet > 0 ) {

			echo '<input type="hidden" name="id" value="' . $idGet . '">';

		}

	?>



	nazwa: <input type="text" name="nazwa" <?php if( isSet( $result['nazwa'] ) ) { echo 'value="' . $result['nazwa'] . '"'; } ?>><br><br>

	marka: <select name="id_marka">

		<?php

		foreach ( $marka as $value ) {

			$selected = ( $value['id']  == $result['id_marka'] ) ? 'selected="selected"' : '';

			echo '<option ' . $selected . ' value="' . $value['id'] . '">' . $value['marka'] . '</option>';

		}

		?>

	</select>
    status: <select name="status">

        <?php

        foreach ( $status as $value ) {

            $selected = ( $value['id']  == $result['status'] ) ? 'selected="selected"' : '';

            echo '<option ' . $selected . ' value="' . $value['id'] . '">' . $value['status1'] . '</option>';

        }

        ?>

    </select>





	<br><br>

	opis: <input type="text" name="opis"  <?php if( isSet( $result['opis'] ) ) { echo 'value="' . $result['opis'] . '"'; } ?>><br><br>



	<input type="submit" value="Zapisz">

</form>  

