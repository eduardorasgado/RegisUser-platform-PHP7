<?php 
	$user = null;
	$query = null;

	if(!empty($_POST)){
		//malas prácticas de PHP login(con esto nos pueden hacer SQLInjection)
		//ejemplo en el login: max@mailchimp.com ' OR 1 = 1;--

		//require_once 'config.php';

		//$query = "SELECT * FROM users WHERE email = '".$_POST['email']."'AND password = '".md5($_POST['password'])."'"; 
		//$queryResult = $PDO->query($query);

		//$user = $queryResult->fetch(PDO::FETCH_ASSOC);

		#BUENAS PRÁCTICAS DE PHP LOGIN:

		require_once 'config.php';
		$sql = "SELECT * FROM users WHERE email =:email AND password =:password";
		$query = $PDO->prepare($sql);
		$query->execute([
			'email' => $_POST['email'],
			'password' => md5($_POST['password'])
		]);

		$user = $query->fetch(PDO::FETCH_ASSOC);
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
			<h1>Fake Login</h1>
			<a href="index.php">Home</a><br><br>
			<form action="fake-login.php" method="POST">
				<label for="email">Email</label>
				<input type="text" name="email" id="email">
				<br/>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
				<br/>
				<input type="submit" value="Login" name="">
			</form>
			<h2>Query</h2>
			<div>
				<?php 
					print_r($query);
				 ?>
			</div>
			<h2>User Data</h2>
			<div>
				<?php 
					print_r($user);
				 ?>
			</div>
		</div>
	</body>
</html>

