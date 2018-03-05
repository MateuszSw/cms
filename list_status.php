<?php

	function t1($val, $min, $max) {

	         return ($val >= $min && $val <= $max);

	     }

    $count = $dbh->query( 'SELECT COUNT(id) as cnt FROM status1' )->fetch()['cnt'];



    $page = isSet( $_GET['page'] ) ? intval( $_GET['page'] - 1 ) : 0;



    $limit = 5;



    $from = $page * $limit;





    $allPage = ceil( $count / $limit );
     
    

    echo 'COUNT: ' . $count . '<br>';

    echo 'LIMIT: ' . $limit . '<br>';

   // echo 'FROM: ' . $from . '<br>';

    echo 'ALL PAGE: ' . $allPage . '<br>'; 

	$sth = $dbh->prepare( 'SELECT * FROM status1 LIMIT :from, :limit' );
	$sth->bindParam( ':limit', $limit, PDO::PARAM_INT ); # zamienia wartości na INTIGER :wink:
	$sth->bindParam( ':from', $from, PDO::PARAM_INT );
	$sth->execute();

	$result = $sth->fetchAll();

	//echo '<pre>';
	//print_r($result);

	echo '<table border="3">';
	echo '<tr><th>  NAZWA Statusu	</th><th>Edytuj</th></tr>' ;

	foreach ($result as $value ) 

	{
	echo '<tr><td>'.$value['status1'].'</td><td>

	 <a href="'.url('edit_stat',array(
			'id' =>$value['id']
			)).'"> Edytuj</a>

	</td></tr>';
		
		
	}

	echo '</table>';

	if( $page > 4 ) {

	        echo '<a href="'.url('list_status',array('page' => 1)).'"> < pierwsza strona </a> | ';

	    }



	    for( $i = 1; $i <= $allPage; $i++ ) {



	        $bold = ( $i == ( $page + 1 ) ) ? 'style="font-size: 24px;"' : '';





	        if( t1( $i, ( $page -3 ), ( $page + 5 ) ) ) {



	            echo '<a ' . $bold . ' href="' . url('list_status',array('page' => $i)) . '">' . $i . '</a> | ';//przejście do strony 



	        }



	    }



	     if( $page < ( $allPage - 1 ) ) {

	         echo '<a href="'.url('list_status',array('page' => $allPage)).'">ostatnia strona > </a> | ';

	     }
	     //echo '<br>';
	     echo'<a href="'.url('list').'">Cofnij do listy samochodow</a>';
?>