<?php 
include 'cadeado.php';

	if(!empty($_POST['produto']) && !empty($_POST['valor']) && !empty($_POST['link']))
	{
		$produto	= $_POST['produto'];
		$valor 		= $_POST['valor'];
		$link		= $_POST['link'];
		$id_produto = $_POST['idproduto'];

		include 'connect.php';

		$sql = "UPDATE tb_produto
				SET produto = '$produto', preco = '$valor', link = '$link'
				WHERE id_produto = $id_produto";

		
		$resultado = mysqli_query($connect, $sql);

		if(mysqli_affected_rows($connect) > 0)
			header('location:lista_desejos.php?msg=editSucesso');
		else
			//header('location:lista_desejos.php?msg=editErro');
			echo mysqli_error($connect);
	}
	else
		header('location:editar.php?msg=camposVazios');

?>