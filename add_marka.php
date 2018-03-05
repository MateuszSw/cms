<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
</head>

<body>
	<form name="formularz" method="POST" action="<?php url('add_marka');?>">
		NAZWA MArki:<input type="text" name="marka" />
		<br/>
		<input type="submit" value="akceptuj" name="akceptuj"></input>
		<br/>

		

	</form>

<?php


if(isset($_POST['marka']) ){

	$stmt = $dbh->prepare( 'INSERT INTO `marka` (   `marka` ) VALUES (:marka) ');

	$stmt->bindParam( ':marka', $_POST['marka'] );
		$stmt->execute();


}

?>

</body>
</html>