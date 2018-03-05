<form name="formularz" action="<?php url('add'); ?>" method="POST" enctype="multipart/form-data">

    

    

<?php
 $id = isSet( $_POST['id'] ) ? intval( $_POST['id'] ) : 0;
//FETCH ALL FROM MARKA
// $fileName = 0;
//     if( isSet( $_FILES['cover']['error'] ) && $_FILES['cover']['error'] == 0 ) {
//         //require( "vendor/autoload.php" );
//         $uid = uniqid();
//         $ext = pathinfo( $_FILES['cover']['name'], PATHINFO_EXTENSION );
//         $fileName = 'cover_' . $uid . '.' . $ext;
//         $fileNameOrg = 'org_' . $uid . '.' . $ext;
//         $imagine = new Imagine\Gd\Imagine();
//         $size    = new Imagine\Image\Box(200, 200);
//         $mode    = Imagine\Image\ImageInterface::THUMBNAIL_INSET;
//         $mode    = Imagine\Image\ImageInterface::THUMBNAIL_OUTBOUND;
//         $imagine->open( $_FILES['cover']['tmp_name'] )
//             ->thumbnail( $size, $mode )
//             ->save( __DIR__ . '/img/' . $fileName );
//         move_uploaded_file( $_FILES['cover']['tmp_name'], __DIR__ . '/img/' . $fileNameOrg );
//     }
//     if( $id > 0 ) {
//         if( $fileName ) {
//             $sth = $pdo->prepare( 'UPDATE `regal` SET `autor`=:autor,`cat_id`=:cat_id,`tytul`=:tytul,`recenzja`=:recenzja, `cover`=:cover WHERE id = :id' );
//             $sth->bindParam( ':cover', $fileName );
//             $sthCov = $pdo->prepare( 'SELECT cover FROM regal WHERE id = :id' );
//             $sthCov->bindParam( ':id', $id );
//             $sthCov->execute();
//             $cover = $sthCov->fetch()['cover'];
//             if( $cover ) {
//                 unlink( __DIR__ . '/img/' . $cover );
//                 unlink( __DIR__ . '/img/' . str_replace( 'cover_', 'org_', $cover ) );
//             }}}
$sth = $dbh -> prepare("SELECT id, marka FROM marka");

$sth -> execute();

echo "<pre>";

$result_marka = $sth -> fetchAll();


$sth2 = $dbh -> prepare("SELECT id, status1 FROM status1");
$sth2 -> execute();
$result_status = $sth2 -> fetchAll();
        
        //$fhandle = fopen($_FILES['cover']['tmp_name'], "r");
        //$content = base64_encode(fread($fhandle, $_FILES['cover']['size']));
        //fclose($fhandle);
        //$sth->bindParam( ':cover', $content, PDO::PARAM_INT );
        //$sth->execute();
    if (isset($_FILES["file"]["name"])) {

    $name = $_FILES["file"]["name"];

    $tmp_name = $_FILES['file']['tmp_name'];

    $error = $_FILES['file']['error'];

    if (!empty($name)) {

        $location = getcwd().'/img/';

        if  (move_uploaded_file($tmp_name, $location.$name)){

            echo 'wyslano';

        }

    } else {

        echo 'wybierz plik';

    }

}
?>




    NAZWA:

    <input type=text name="nazwa">

    <BR>

    OPIS:    <textarea name="opis"></textarea><BR>      

    MARKA:

    <select name="id_marka">        

        <?php

            foreach($result_marka as $klucz_marka => $value_marka)

                {

                    echo '<option value='.$klucz_marka.'>'.$value_marka[1].'</option>';    

                }

        ?>

    </select>

    <select name="status">        

            
            <?php

            foreach($result_status as $klucz_status => $value_status)

                {

                    echo '<option value='.$klucz_status.'>'.$value_status[1].'</option>';    

                }

        ?>


    </select>
    <input type="file" name="cover" accept="img/*" /><br>

    <input type="submit" name="submit" value="wyslij">



<?php



if (isset($_POST['nazwa']) AND isset($_POST['opis']) AND isset($_POST['id_marka'])) 

    {

        

        $errors = '';

        if (isset($_POST['submit'])) 

            {

                $imgFile = $_FILES['cover']['name'];
                $tmp_dir = $_FILES['cover']['tmp_name'];
                $imgSize = $_FILES['cover']['size'];
                if(empty($imgFile)){
                     $errMSG = "Please Select Image File.";
                 }
                 else
  {
   $upload_dir = 'cover/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }}

                if (!isset($_POST['id_marka']) AND $_POST['id_marka'] == '') 

                    {

                        $errors .= 'Pole nazwa nie może być puste';

                    }

                if (!isset($_POST['opis']) AND $_POST['opis'] == '') 

                    {

                        $errors .= 'Pole opis nie może być puste';

                    }
                if (!isset($_POST['status']) AND $_POST['status'] == '') 

                    {

                        $errors .= 'Pole status nie może być puste';

                    }
               

                if ($errors == '') 

                    {

                        try 

                            {

                                $stmt = $dbh -> prepare("INSERT INTO cars (nazwa, opis, id_marka,status, cover ) VALUES(:nazwa, :opis, :id_marka, :status, :cover)");

                                $stmt -> bindParam(':id_marka', $_POST['id_marka']);

                                $stmt -> bindParam(':nazwa', $_POST['nazwa']);

                                $stmt -> bindParam(':opis', $_POST['opis']);
                                $stmt -> bindParam(':status', $_POST['status']);
                                $stmt -> bindParam(':cover', $_FILES['cover']);

                                if($stmt->execute())
   {
    $successMSG = "new record succesfully inserted ...";
    header("refresh:5;index.php"); // redirects image view page after 5 seconds.
   }
   else
   {
    $errMSG = "error while inserting....";
   }

                                if ($dbh -> lastInsertId())
                                header( 'location: index.php?file=list' );
                                echo 'Dodano pomyślnie!!';

                                

                                

                                

                        
                            } 

                        catch(PDOException $err) 

                            {

                                echo '<pre>';

                                print_r($err -> getMessage());

                                print_r($err -> getLine());

                                die ;        

                            }   

                    }    

            }

    }


 echo'<a href="'.url('add_file').'">dodaj zdjecie|</a>';
//SHOW ALL ROWS IN CARS