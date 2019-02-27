<?php 
include 'cadeado.php';

if(!empty($_GET['id_produto']))
{
	$id_produto = $_GET['id_produto'];

	include 'connect.php';

	$sql = "DELETE FROM tb_produto
			WHERE id_produto = $id_produto";

	$resultado = mysqli_query($connect, $sql);

	if($resultado)
		header('location:lista_desejos.php?msg=deleteSucesso');
	
	else
		header('location:lista_desejos.php?msg=deleteFail');
}
else
		header('location:lista_desejos.php?msg=deleteFail2');

?>