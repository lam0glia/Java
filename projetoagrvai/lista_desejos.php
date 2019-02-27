
<?php include 'cadeado.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

<style>
#divBusca{
  background-color:#E0EEEE;
  border:solid 2px #5F9EA0;
  border-radius:10px;
  width:300px;
  height:32px;
}
 
#txtBusca{
  float:left;
  background-color:transparent;
  padding-left:5px; 
  font-size:18px;
  border:none;
  height:32px;
  width:191px;
}
 
#btnBusca{
  border:none;
  float:left;
  height:30px;
  border-radius:0 7px 7px 0;
  width:76px;
  font-weight:bold;
  background:#5F9EA0;
}
 
#divBusca img{
  float:left;
  height: 29px;
}
</style>


	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Lista de desejos</title>
</head>
<body class="container-fluid">

	<?php 
	
	include 'menu.php';?>

<?php include 'func.php';
	  include 'connect.php';

	msg();

	?>

	<h3 class="text-dark">Lista de desejos de <b><?php echo $_SESSION['usuario']; ?></b> - 
		<button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#formModalCenter">Novo produto
	</button>
	</h3>

	<!-- Modal -->
	<div class="modal fade" id="formModalCenter" tabindex="-1" role="dialog" aria-labelledby="formModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="formModalCenterTitle">Novo Produto</h5>
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
			WHERE tb_produto.id_usuario  = $id_usuario";
	}
	else
	{
	$sql = "SELECT id_produto, produto, preco, link FROM
			tb_produto INNER JOIN tb_usuarios 
			ON tb_produto.id_usuario = tb_usuarios.id_usuario";
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
			    	<th colspan="2" class="text-center">Ações</th>
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
					echo '<td><a target="blank" href="' .$valor_atual. '">Link</a></td>';
				}
		
			}

			echo '<td class="text-center"><a href="editar_produto.php?id_produto='.$id_produto.'" class="btn btn-outline-secondary">Editar</a></td>';
			echo '<td class"=text-center"><a href="deletar_produto.php?id_produto='.$id_produto.'"  class="btn btn-outline-danger">Deletar</a></td>';
			echo '</tr>'; 
		}
		?>
			</thead>
		</table>
		<?php 

	}
	else
	{
		echo '<h3 class="alert alert-dark" role="alert">Parece que você não tem produtos na sua lista de desejos.</h3>';
	}


	?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>