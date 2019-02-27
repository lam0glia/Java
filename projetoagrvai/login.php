<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Aula 14 - Login</title>
</head>
<body class="container-fluid">

	<?php 
	include 'menu.php'; 
	include 'func.php';
	msg();
	?>

	<h3 class="text-dark">Entrar no Sistema</h3>

	<form name="login" action="validar_login.php" method="post">
		
		<p>
			<label>Usuário ou E-mail:</label><br>
			<input type="text" name="usuario" required="">
		</p>

		<p>
			<label>Senha:</label><br>
			<input type="password" name="senha" required="">
		</p>

		<p>
			<button type="submit" class="btn btn-outline-dark">Entrar</button>
		</p>

	</form>


</body>
</html>