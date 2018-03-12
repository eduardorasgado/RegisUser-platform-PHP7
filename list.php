<?php 
	require_once 'config.php';

	$queryResult = $PDO->query("SELECT *  FROM users");
	//while($row = $queryResult->fetch(PDO::FETCH_ASSOC)){ 
		//fetch regresa de uno por uno cada uno de los registros q hacemos
	//	var_dump($row);
	//	echo '<br>';
	//}

	//echo '<br>';echo '<br>';echo '<br>';
	//foreach($queryResult as $result){
	//	var_dump($result);
	//	echo '<br>';
	//}
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
			<h1>List Users</h1>
			<a href="index.php">Home</a>
			<br><br>
			<table class="table">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Editar</th>
					<th>Borrar</th>
				</tr>
				<?php foreach ($queryResult as $result): ?>
					<tr>
						<td><?= $result['name']?></td>
						<td><?= $result['email']?></td>
						<!--esto pone en el url el elemento id para get-->
						<td><a href="update.php?id=<?=$result['users_id']?>">Edit</a></td>
						<td><a href="delete.php?id=<?=$result['users_id']?>">Borrar</a></td>
					</tr>
				<?php endforeach; ?>		
			</table>
		</div>
	</body>
</html>

