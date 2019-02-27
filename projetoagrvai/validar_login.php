<?php 
	if(empty($_POST['usuario']) || empty($_POST['senha']))
	{
		header('location:login.php?msg=camposVazios');
	}
	else
	{
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];


		include 'connect.php';

		$sql = "SELECT id_usuario, usuario, senha, email 
				FROM tb_usuarios 
				WHERE (usuario LIKE '$usuario' OR email LIKE '$usuario')";


		$resultado = mysqli_query($connect, $sql);



		if(mysqli_affected_rows($connect) > 0)
		{
			
			//array login
			$login = mysqli_fetch_assoc($resultado);

			if(password_verify($_POST['senha'], $login['senha']))
			{

			session_start();
			$_SESSION['id_usuario'] = $login['id_usuario'];
			$_SESSION['usuario'] 	= $login['usuario'];
			$_SESSION['senha'] 		= $login['senha'];
			$_SESSION['email'] 		= $login['email'];

			header('location:lista_desejos.php');
			}
			else
				header('location:login.php?msg=senhaErro');

		}
		else
		{
			header('location:login.php?msg=loginErro');
		}
	}
?>