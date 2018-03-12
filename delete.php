<?php 
	include_once 'config.php';

	$id = $_GET['id'];

	echo $id;
	if ($id == null){
		header("Location: list.php");
	}
	else{
		$sql = "DELETE FROM users WHERE users_id=:id";
		$query = $PDO->prepare($sql);

		$query->execute([
			'id' => $id
		]);

	header("Location: list.php");
	}
	
?>
