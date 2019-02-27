<?php 
	if(empty($_POST['usuario']) || empty($_POST['senha']))
	{
		header('location:login.php?msg=emptyFields');
	}
	else
	{
		$usuario = $_POST['usuario'];
		$senha   = $_POST['senha'];

		include 'conn.php';

		$sql = "SELECT id_usuario, usuario, senha, email FROM tb_usuarios 
		WHERE (usuario LIKE '$usuario' OR 
		email LIKE '$usuario') AND senha LIKE '$senha' ";

		$resultado = mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn) > 0)
		{
			$login = mysqli_fetch_assoc($resultado);

			session_start();
			$_SESSION['id_usuario'] = $login['id_usuario'];
			$_SESSION['usuario'] 	= $login['usuario'];
			$_SESSION['senha'] 		= $login['senha'];
			$_SESSION['email'] 		= $login['email'];

			header('location:agenda.php');
		}
		else
		{
			header('location:login.php?msg=loginError');
		}
	}
?>