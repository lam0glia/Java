<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Aula 14 - Home</title>
</head>
<body class="container-fluid">

	<?php include 'connect.php'; 

	if(session_status() == PHP_SESSION_NONE)
		session_start();

	if(empty($_SESSION['usuario']) && empty($_SESSION['senha']))
		include 'login.php';

	else
	{   include 'menu.php'; ?>

		<h3 class="text-dark">Lista de desejos <b><?php echo $_SESSION['usuario']; ?></b></h3>

		<!-- Modal -->
		<div class="modal fade" id="formModalCenter" tabindex="-1" role="dialog" aria-labelledby="formModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="formModalCenterTitle">Novo Evento</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <?php include 'desejos.php'; ?>
		      </div>
		    </div>
		  </div>
		</div>

		<?php

		$id_usuario = $_SESSION['id_usuario'];

		if($id_usuario != 9)
		{
		$sql = "SELECT id_produto, produto, preco, link FROM
				tb_produto INNER JOIN tb_usuarios 
				ON tb_produto.id_usuario = tb_usuarios.id_usuario
				WHERE tb_produto.id_usuario  = $id_usuario
				ORDER BY id_produto DESC
				LIMIT 10";
		}
		else
		{
		$sql =	"SELECT id_produto, produto, preco, link FROM
				tb_produto INNER JOIN tb_usuarios 
				ON tb_produto.id_usuario = tb_usuarios.id_usuario
				ORDER BY id_produto DESC
				LIMIT 10";
		}
		
		$resultado = mysqli_query($connect, $sql);

		if(mysqli_affected_rows($connect) > 0)
		{
			$desejos = array(); ?>

			<table class="table">
  			<thead class="thead-dark">
			    <tr>
			    	<th scope="col">#</th>
			    	<th scope="col" class="text-center">Produto</th>
			    	<th scope="col">Preço</th>
			    	<th scope="col">Link</th>
			    </tr>
			    <?php 
			while ($desejos = mysqli_fetch_assoc($resultado) )
			{
				echo '<tr>';

				foreach ($desejos as $coluna_atual => $valor_atual) {

					if($coluna_atual == 'id_produto')
					{
						$id_produto = $valor_atual;
						echo '<td>' .$valor_atual. '</td>';
					}
					else if($coluna_atual == 'produto')
					{
						echo '<td class = "text-center">' .$valor_atual. '</td>';
					}
					else if($coluna_atual == 'preco')
					{
						$preco = $valor_atual;
						$valor_atual = number_format($preco, 2, ',', '.');
						echo '<td>R$' .$valor_atual. '</td>';
					}
					else if($coluna_atual == 'link')
					{
						echo '<td><a href="' .$valor_atual. '">Link</a></td>';
					}
			
				}
			}
			?>
				</thead>
			</table>
					<?php 
			 
		}
		else
		{
			echo '<h3 class="alert alert-info">Parece que você não tem produtos na sua lista de desejos.</h3>';
		}

	}?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>