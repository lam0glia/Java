<?php 

	include 'func.php';

	validar_form_cad();

	$usuario = $_POST['usuario'];
	$senha   = $_POST['senha'];
	$email   = $_POST['email'];

	include 'conn.php';

	$sql = "INSERT INTO tb_usuarios (usuario, senha, email) 
	VALUES ('$usuario', '$senha', '$email') ";

	$resultado = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:login.php?msg=cadSuccess');
	}
	else
	{
		header('location:cadastro.php?msg=cadError');
	}

?>