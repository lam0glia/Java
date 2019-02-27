<?php include 'cadeado.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Atualizar dados</title>
</head>
<body class="container-fluid">

	<?php include 'menu.php'; 

	if(!empty($_GET['id_produto']))
	{
		$id_produto = $_GET['id_produto'];

		include 'connect.php';

		$sql = "SELECT produto, preco, link, id_usuario
				FROM tb_produto
				WHERE id_produto = ".$id_produto;

		$resultado = mysqli_query($connect, $sql);

		if(mysqli_affected_rows($connect) > 0)
		{
			$produto = mysqli_fetch_assoc($resultado); ?>

			<h2 class="text-dark">Editar dados do produto</h2>
			<form action="edicao.php" method="post">
				<p>
					<label>Produto:</label><br>
					<input type="text" name="produto" value="<?php echo $produto['produto']; ?>">
				</p>

				<p>
					<label>Preço:</label><br>
					<input type="text" name="valor" value="<?php echo $produto['preco']; ?>">
				</p>

				<p>
					<label>Link:</label><br>
					<input type="text" name="link" value="<?php echo $produto['link']; ?>">
				</p>

				<input type="hidden" name="idproduto" value="<?php echo $id_produto; ?>">

				<p>
					<button class="btn btn-outline-dark" type="submit">Concluir</button>
				</p>

				
			</form>

			<?php 
		}
	}

	?>

</body>
</html>