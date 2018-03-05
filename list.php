<!DOCTYPE html>
<html>
<head>
  <title>Samochody</title>
  <meta charset="utf8_polish_ci" />
  <link rel="stylesheet" href="style.css" /> 
</head>

<body>



<?php
    function t1($val, $min, $max) {

         return ($val >= $min && $val <= $max);

    }

    $count = $dbh->query( 'SELECT COUNT(id) as cnt FROM cars' )->fetch()['cnt'];
    


    $page = isSet( $_GET['page'] ) ? intval( $_GET['page'] - 1 ) : 0;



    $limit = 5;



    $from = $page * $limit;


    // $count= $count - 10;


    $allPage = ceil( $count / $limit );
     
    //echo 'PAGE: ' . $page . '<br>';

    echo 'COUNT: ' . $count . '<br>';

    echo 'LIMIT: ' . $limit . '<br>';

    //echo 'FROM: ' . $from . '<br>';

    echo 'ALL PAGE: ' . $allPage . '<br>';
    




    $sth = $dbh->prepare('
            SELECT cars.nazwa, cars.cover, cars.id, cars.opis, marka.marka, status1.status1 FROM cars, marka, status1 WHERE cars.id_marka=marka.id AND cars.status = status1.id ORDER BY cars.id ASC LIMIT :from, :limit'
   );
    //$sth = $dbh->prepare( 'SELECT * FROM marka LIMIT :from, :limit' );
    $sth->bindParam( ':limit', $limit, PDO::PARAM_INT ); # zamienia wartości na INTIGER :wink:
    $sth->bindParam( ':from', $from, PDO::PARAM_INT );
    $sth->execute();
   // echo 'zapytanie: ' . $sth . '<br>';

  echo "


  <table cellsapacing=1 cellpadding=3 border=1 class=nowa>

      <tr>

          <td>ID</td>

          <td>NAZWA</td>    

          <td>OPIS</td> 
          <td>marka</td>    
          <td>status</td>
          <td>OPCJE</td>

   


      </tr>";

    

    

                foreach($sth->fetchAll() as $value)

                {

                echo '

                <tr>

                   <td>'.$value['id'].'</td>

                    <td>'.$value['nazwa'].'</td>    

                    <td>'.$value['opis'].'</td>
                    <td>'.$value['marka'].'</td>
                    <td>'.$value['status1'].'</td>';
                    echo '<td>';
                    if( $value['cover'] ) {
                        echo '<a target="_blank" href="img/' . str_replace( 'cover_', 'org_', $value['cover'] ) . '"><img src="img/' . $value['cover'] . '"></a>';
                    } else {
                        echo 'Brak okladki';
                    }
                echo '</td>';


                         echo' <td><a href="'.url('usun',array(
                            'id'=> $value['id']
                            )).'">Usun rekord</a> |
                            <a href="'.url('update',array(
                            'id'=> $value['id']
                            )).'">Edytuj rekord</a></td>';

                            
                           
                           echo' </tr>';

                            
                          }
  echo"</table>";   
  echo'<a href="'.url('add').'">Dodaj samochod|</a>';
  echo'<a href="'.url('add_marka').'">Dodaj marke|</a>';
  echo'<a href="'.url('add_stat').'">Dodaj status|</a>';
  echo'<a href="'.url('list_marki').'">Lista marek|</a>';
  echo'<a href="'.url('list_status').'">Lista Statusu|</a>';
  echo "<br>";
  
  //url('add_stat');
  if( $page > 4 ) {

          echo '<a href="'.url('list',array('page' => 1)).'"> < pierwsza strona </a> | ';

      }



      for( $i = 1; $i <= $allPage; $i++ ) {



          $bold = ( $i == ( $page + 1 ) ) ? 'style="font-size: 24px;"' : '';





          if( t1( $i, ( $page -3 ), ( $page + 5 ) ) ) {



              echo '<a ' . $bold . ' href="' . url('list',array('page' => $i)) . '">' . $i . '</a> | ';//przejście do strony 



          }



      }



       if( $page < ( $allPage - 1 ) ) {

           echo '<a href="'.url('list',array('page' => $allPage)).'">ostatnia strona > </a> | ';

       }
        $count_null=0;
      // foreach ($sth as $value) {
      //   # code...
      //   if($value['id_marka']=='0'){
      //     for ($i=0; $i < $count; $i++) { 
      //       # code...
      //        $count_null=$count_null+1;
      //     }
      //   }
      // }
      // echo $count_null;
      //  foreach($sth as $klucz => $wartosc)
      // {
      //   if ($klucz->$wartosc['id_marka']=0) {
      //     # code...
      //     $count_null=$count_null+1;
      //   }
      // }
      // echo $count_null;
?>
</body>
</html>