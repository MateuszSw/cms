<?php 

$sth = $dbh->prepare( "SELECT * FROM `status1`" );

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
?>