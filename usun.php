<?php
   



    //include( 'db/pdo.php' );
    $id = isSet( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;
    if( $id > 0 ) {
       $sth = $dbh->prepare( 'DELETE FROM cars WHERE id = :id' );
        $sth->bindParam( ':id', $id );
       $sth->execute();
       //$redirect = '?file=list';
          header('Location: index.php?file=list');
    } else {
        //$redirect = '?file=list';
       header('Location: index.php?file=list');
    }
    echo $_GET['id'];
