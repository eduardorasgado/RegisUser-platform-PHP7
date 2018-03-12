<?php 
	include_once 'config.php';
	
	$result = false;

	if(!empty($_POST)){
		//se obtiene al presionar el botón update
		$id = $_POST['id'];
		$new_name = $_POST['name'];
		$new_email = $_POST['email'];

		//consulta para introducir, mucho cuidado con no AGREGAR EL WHERE
		$sql = "UPDATE users SET name=:name,email=:email WHERE users_id=:id";
		$query = $PDO->prepare($sql);
		$query->execute([
			'id' => $id,
			'name' => $new_name,
			'email' => $new_email
		]);

		$nameValue = $new_name;
		$emailValue = $new_email;

		$result = true;
	}
	else {
		//consulta para extraer información
		$id =$_GET['id'];  //obtenido del url
		$sql = "SELECT * FROM users WHERE users_id=:id";
		$query = $PDO->prepare($sql);
		$query->execute([
			'id' => $id
		]);

		$row = $query->fetch(PDO::FETCH_ASSOC);
		$nameValue = $row['name'];
		$emailValue = $row['email'];	
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Databases for php</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<h1>Update User</h1>
			<a href="list.php">Regresar a la lista</a>
			<br/><br/>
			<!--estas clases alert nos las da bootstrap-->
			<?php 
				if ($result){
					//ejecutamos mensaje de alerta si hay éxito en el query
					echo '<div class="alert alert-success">Usuario actualizado! Excelente :D</div>';
				}
			 ?>
			<form action="update.php" method="POST">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" value="<?php echo "$nameValue";?>">
				<br/>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?php echo "$emailValue"; ?>">
				<br/>
				<input type="hidden" name="id" value="<?php echo $id ?>">
				<input type="submit" value="Update" name="">
			</form>
		</div>
	</body>
</html>

