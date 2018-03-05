<?php
#edytowanie Marki
	$a = $_GET['id'];

	if (isset ($_GET['id']))
	{
		$stmt = $dbh ->prepare( ' SELECT * FROM `marka` WHERE id=:a');
		$stmt->bindParam( ':a', $_GET['id'] );
	
		$stmt->execute();	
		$result = $stmt->fetch();



			if(isset($_POST['marka']) ){

			$stmt = $dbh->prepare( 'UPDATE marka SET marka=:marka WHERE id=:id ');

			$stmt->bindParam( ':marka', $_POST['marka'] );
			$stmt->bindParam( ':id', $_GET['id'] );
			$stmt->execute();

			header('location:'.url('list_marki'));
			}


	}
?>

	<form name="formularz" method="POST" action="<?php echo url('edit_marki',array(
		'id' =>$result['id']
	));?>">
		NAZWA:<input type="text" name="marka" value="<?php echo $result['marka'] ?>" />
		<br/>
		<input type="submit" value="postoj" name="postoj" ></input>
		<br/>

		

	</form>