<!DOCTYPE html>
<html>
<head>
	<title>marki</title>
	<meta charset="utf-8" />
</head>

<body>
	


<?php 

	function t1($val, $min, $max) {

	         return ($val >= $min && $val <= $max);

	     }

	    $count = $dbh->query( 'SELECT COUNT(id) as cnt FROM marka' )->fetch()['cnt'];



	    $page = isSet( $_GET['page'] ) ? intval( $_GET['page'] - 1) : 0;



	    $limit = 5;



	    $from = $page * $limit;





	    $allPage = ceil( $count / $limit );
	     
	   // echo 'PAGE: ' . $page . '<br>';

	    echo 'COUNT: ' . $count . '<br>';

	    echo 'LIMIT: ' . $limit . '<br>';

	   // echo 'FROM: ' . $from . '<br>';

	    echo 'ALL PAGE: ' . $allPage . '<br>'; 

	// $sth = $dbh->prepare( "SELECT * FROM `status1`" );

	// $sth->execute();

	// $result = $sth->fetchAll();



	$sth = $dbh->prepare( 'SELECT * FROM marka LIMIT :from, :limit' );
	$sth->bindParam( ':limit', $limit, PDO::PARAM_INT ); # zamienia wartości na INTIGER :wink:
	$sth->bindParam( ':from', $from, PDO::PARAM_INT );
	$sth->execute();

	$result = $sth->fetchAll();

	//echo '<pre>';
	//print_r($result);

	echo '<table border="3">';
	echo '<tr><th>  Marka	</th><th>Usuń</th><th>Edytuj</th></tr>' ;

	foreach ($result as $value ) 

	{
	echo '<tr><td>'.$value['marka'].'</td><td>

	<a href="'.url('del_marki',array(
	                            'id'=> $value['id']
	                            )).'">Usuń</a></td><td> <a href="'.url('edit_marki',array(
			'id' =>$value['id']
			)).'"> Edytuj</a>

	</td></tr>';
		
		
	}

	echo '</table>';

	if( $page > 4 ) {

		        echo '<a href="'.url('list_marki',array('page' => 1)).'"> < pierwsza strona </a> | ';

		    }



		    for( $i = 1; $i <= $allPage; $i++ ) {



		        $bold = ( $i == ( $page + 1 ) ) ? 'style="font-size: 24px;"' : '';





		        if( t1( $i, ( $page -3 ), ( $page + 5 ) ) ) {



		            echo '<a ' . $bold . ' href="' . url('list_marki',array('page' => $i)) . '">' . $i . '</a> | ';//przejście do strony 



		        }



		    }



		    if( $page < ( $allPage - 1 ) ) {

		         echo '<a href="'.url('list_marki',array('page' => $allPage)).'">ostatnia strona > </a> | ';

		     }
		    //echo '<br>';
	     	echo'<a href="'.url('list').'">Cofnij do listy samochodow</a>';
?>
</body>
</html>