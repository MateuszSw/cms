<?php
#edytowanie Marki
	$a = $_GET['id'];

	if (isset ($_GET['id']))
	{
		$stmt = $dbh ->prepare( ' SELECT * FROM `status1` WHERE id=:a');
		$stmt->bindParam( ':a', $_GET['id'] );
	
		$stmt->execute();	
		$result = $stmt->fetch();



			if(isset($_POST['status1']) ){

			$stmt = $dbh->prepare( 'UPDATE status1 SET status1=:status1 WHERE id=:id ');

			$stmt->bindParam( ':status1', $_POST['status1'] );
			$stmt->bindParam( ':id', $_GET['id'] );
			$stmt->execute();

			header('location:'.url('list_status'));
			}


	}
?>

	<form name="formularz" method="POST" action="<?php echo url('edit_stat',array(
		'id' =>$result['id']
	));?>">
		NAZWA:<input type="text" name="status1" value="<?php echo $result['status1'] ?>" />
		<br/>
		<input type="submit" value="postoj" name="postoj" ></input>
		<br/>

		

	</form>