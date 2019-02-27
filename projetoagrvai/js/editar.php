<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Atualizar dados</title>
</head>
<body class="container">

	<?php include 'menu.php'; 

	if(!empty($_GET['id_evento']))
	{
		$id_evento = $_GET['id_evento'];

		include 'conn.php';

		$sql = "SELECT evento, prioridade, data, id_usuario
				FROM tb_evento
				WHERE id_evento = ".$id_evento;

		$resultado = mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn) > 0)
		{
			$evento = mysqli_fetch_assoc($resultado); ?>

			<h2 class="text-info">Editar dados do evento</h2>
			<form action="edicao.php" method="post">
				<p>
					<label>Evento:</label><br>
					<input type="text" name="evento" value="<?php echo $evento['evento']; ?>">
				</p>

				<p>
					<label>Prioridade:</label><br>
					<input type="radio" name="prioridade" value="Normal">Normal
					<input type="radio" name="prioridade" value="Urgente">Urgente
				</p>

				<p>
					<label>Data:</label><br>
					<input type="date" name="data" value="<?php echo $evento['data']; ?>">
				</p>

				<p>
					<button class="btn btn-primary" type="submit">Concluir</button>
				</p>

				<input type="hidden" name="idevento" value="<?php echo $id_evento; ?>">
			</form>

			<?php 
		}
	}

	?>


	


</body>
</html>