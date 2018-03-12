<?php 
	require_once 'config.php';
	$result = false; //global para ser aceptado en otros scripts de php mas abajo en el html

	if (!empty($_POST)){
		$name = $_POST['name'];
		$email = $_POST['email'];
		//procurar encriptar passwords bajo métodos mas seguros ! ! !
		$password = md5($_POST['password']);
		//echo "You are $name, your email is $email, and your pass is: $password";
		
		//Faltan métodos de validación
		//
		//

		try {
			$sqlrequest = "INSERT INTO users(name,email,password) VALUES (:name, :email, :password)";
			
			$query = $PDO->prepare($sqlrequest);
			
			$result = $query->execute([
				'name' => $name,
				'email' => $email,
				'password' => $password
			]);
		} 
		catch(Exception $e){
			echo $e->getMessage();
		}	
	} //if
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
			<h1>Add User</h1>
			<a href="index.php">Home</a>
			<br/><br/>
			<!--estas clases alert nos las da bootstrap-->
			<?php 
				if ($result){
					//ejecutamos mensaje de alerta si hay éxito en el query
					echo '<div class="alert alert-success">Bien! Estás dentro ;)</div>';
				}
			 ?>	
			<form action="add.php" method="POST">
				<label for="name">Name</label>
				<input type="text" name="name" id="name">
				<br/>
				<label for="email">Email</label>
				<input type="text" name="email" id="email">
				<br/>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
				<br/>
				<input type="submit" value="Save" name="">
			</form>
		</div>
	</body>
</html>
