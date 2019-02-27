<?php

	include 'cadeado.php';
	include 'func.php';
	include 'connect.php';

	if(empty($_POST['produto']) ||
	   empty($_POST['valor']) ||
	   empty($_POST['link']) )
	{
		header('location:lista_desejos.php?msg=camposVazios');
		exit;
	}

	$produto 	= $_POST['produto'];
	$valor 		= $_POST['valor'];
	$link		= $_POST['link'];
	$id_usuario = $_SESSION['id_usuario'];

	$sql = "INSERT INTO tb_produto (produto, preco, link, id_usuario)
			VALUES ('$produto', '$valor', '$link', $id_usuario)"; 

	$resultado = mysqli_query($connect, $sql);

	if(mysqli_affected_rows($connect) > 0)
		header('location:lista_desejos.php?msg=eventoCad');
	else
		//header('location:lista_desejos.php?msg=eventoErro');
		echo mysqli_error($connect);

?>