<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Aula 14 - Cadastre-se</title>
</head>
<body class="container-fluid">

	<?php 

	include 'menu.php'; 
	include 'func.php';

	msg();

	?>

	<h3 class="text-dark">Cadastre-se</h3>

	<form name="cadastrar" action="validar_cadastro.php" method="post">
		
		<p>
			<label>Nome de usuário:</label><br>
			<input type="text" name="usuario" placeholder="Nick" required="">
		</p>

		<p>
			<label>E-mail:</label><br>
			<input type="email" name="email" placeholder="exemplo@exemplo.com" required="">
		</p>

		<p>
			<label>Senha:</label><br>
			<input type="password" name="senha" placeholder="Criar senha" required="">
		</p>

		<p>
			<button type="submit" class="btn btn-outline-dark">Cadastrar</button>
		</p>

	</form>

</body>
</html>