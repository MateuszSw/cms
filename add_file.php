<?php

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

<form action="list.php" method="POST" enctype="multipart/form-data">

    <input type="file" name="file"><br><br>

    <input type="submit" value="Potwierdz">

</form>