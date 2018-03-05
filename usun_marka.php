<?php
	//include( 'db/connect.php' );
	$id = isSet( $_GET['id_marka'] ) ? intval( $_GET['id_marka'] ) : 0;
	if( $id > 0 ) {
        $sth = $dbh->prepare( 'DELETE FROM marka WHERE id = :id' );
		$sth->bindParam( ':id', $id );
        $sth->execute();
        //$redirect = '?file=list';
       	header('Location: index.php?file=list');
	} else {
		//$redirect = '?file=list';
        header('Location: index.php?file=list');
	}
	echo $_GET['id'];