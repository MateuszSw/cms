<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
</head>

<body>
	<form name="formularz" method="POST" action="<?php url('add_stat');?>">
		status1:<input type="text" name="status1" />
		<br/>
		<input type="submit" value="postoj" name="postoj"></input>
		<br/>

		

	</form>

<?php


if(isset($_POST['status1']) ){

	$stmt = $dbh->prepare( 'INSERT INTO `status1` (   `status1` ) VALUES (:status1) ');

	$stmt->bindParam( ':status1', $_POST['status1'] );
		$stmt->execute();


}

?>

</body>
</html>