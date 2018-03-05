<?php
   



    //include( 'db/pdo.php' );
    $id = isSet( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
    if( $id > 0 ) {

       $sth = $dbh->prepare( 'DELETE FROM marka WHERE id = :id' );
       $sth->bindParam( ':id', $id );
       $sth->execute();
       //$redirect = '?file=list';
       header('Location: index.php?file=list_marki');

    } else {
        //$redirect = '?file=list';
       header('Location: index.php?file=list_marki');
    }
    //echo $_GET['id'];