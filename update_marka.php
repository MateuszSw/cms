<?php
$id = $_GET['id'];   
 if(isset($_GET['id'])) {   
  $stmt = $dbh->prepare('SELECT * FROM cars WHERE id =:id');    
  $stmt->bindParam(':id', $_GET['id']);
 
   $stmt->execute();    
   $result = $stmt->fetch(); 
    if (isset($_POST['id'])){    
      $stmt = $dbh->prepare('UPDATE cars SET id_marka=:id_marka, nazwa=:nazwa, opis=:opis WHERE id=:id' );    
      $stmt->bindParam(':id_marka', $_POST['id_marka']);
   $stmt->bindParam(':nazwa', $_POST['nazwa']);
     $stmt = $dbh->prepare('UPDATE marka SET  marka=:marka WHERE id=:id' ); 
     $stmt->bindParam(':marka', $_POST['marka']);
   $stmt->bindParam(':id', $_GET['id']);  
    $stmt->execute();    
    header('location:' .url('lista'));
} }?>
<form action="<?php echo url('update_marka', array(
    'id' => $result['id']
   
));?>" method="post">   
 marka: <select name="marka">
 <?php  
    $sth = $dbh->prepare( "SELECT * FROM marka" );
    $sth->execute();
    $result2 = $sth->fetchAll();    
foreach ($result2 as $value )
   {
       if($value['id']==$result['id)']) {
       echo '<option selected="selected"   value="'.$value['id'].'">'. $value['marka'].'</option>';        }   else {        echo '<option value="'. $value['id'].'">'. $value['marka'].'</option>';        }
   }  ?></select>
    
   nazwa: <input type="text" name="nazwa" value="<?php echo $result['nazwa'] ?>">    opis: <input type="text" name="opis" value="<?php echo $result['opis'] ?>"><input type="submit" value="Zapisz" /></form>