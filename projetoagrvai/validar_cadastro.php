<?php 

if(empty($_POST['usuario'])   ||
	   empty($_POST['email']) ||
	   empty($_POST['senha']) )
	{
		header('location:lista_desejos.php?msg=camposVazios');
		exit;
	}

		$usuario = $_POST['usuario'];
		$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
		$email   = $_POST['email'];

		include 'connect.php';

		$sql = "INSERT INTO tb_usuarios (usuario, senha, email) 
		VALUES ('$usuario', '$senha', '$email') ";

		$resultado = mysqli_query($connect, $sql);

		if(mysqli_affected_rows($connect) > 0)
			header('location:login.php?msg=cadSucesso');

		else
			header('location:cadastro.php?msg=cadErro');
	
?>