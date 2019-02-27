,<?php include 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Aula 14 - Minha Agenda</title>
</head>
<body class="container">

	<?php 
	
	// inclui dependências
	include 'menu.php'; 
	include 'func.php';
	include 'conn.php';

	// chama função que verifica se há parâmetro 'msg' recebido nesta página
	verificar_msg();

	?>

	<!-- Button trigger modal -->
	<h3 class="text-primary">Agenda de <b></button><?php echo $_SESSION['usuario']; ?></b> - 
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formModalCenter">
		Novo Evento
	</button>
	</h3>

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
	        <?php include 'form_evento.php'; ?>
	      </div>
	    </div>
	  </div>
	</div>

	<?php

	$id_usuario = $_SESSION['id_usuario'];

	// cria comando sql:
	$sql = "SELECT id_evento, evento, prioridade, data FROM
			tb_evento INNER JOIN tb_usuarios 
			ON tb_evento.id_usuario = tb_usuarios.id_usuario
			WHERE tb_evento.id_usuario  = $id_usuario";

	// executa comando sql
	$resultado = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		$eventos = array();


		// montagem do cabeçalho
		echo '<table class="table table-sm table-striped table-hover">';
		echo '<tr>';
		echo '<th>Evento #</th>';
		echo '<th>Descrição</th>';
		echo '<th>Prioridade</th>';
		echo '<th>Data</th>';
		echo '<th colspan="2" class="text-center">Ações</th>';
		echo '</tr>';

		// enquanto houverem registros armazenados em 'resultado',
		// transforme cada linha do resultado em um array associativo:
		while ($eventos = mysqli_fetch_assoc($resultado))
		{
			// proxima linha da tabela
			echo '<tr>';
			// foreach abaixo ira percorrer a linha atual gerada pelo array associativo acima, e mostrara o valor de cadavalor na tela, um por vez
			foreach ($eventos as $coluna_atual => $valor_atual) {
				// ao mostrar os valores da atual do array 'eventos', quero que else saem exibidos dentro de uma coluna da tabela:

				if($coluna_atual == 'id_evento')
				{
					$id_evento = $valor_atual;
				}
				else if($coluna_atual == 'data')
				{
					$valor_atual = date("d-m-y", strtotime($valor_atual));
				}

				echo '<td>' .$valor_atual. '</td>'; // linha_atual é um array q recebe os valores da linha e valor_atual percorre os valores de cada linha alguma coisa  assim :)

				if($coluna_atual == 'id_evento')
				{
					$id_evento = $valor_atual;
				}
			}


			echo '<td><a href="editar.php?id_evento='.$id_evento.'" class="btn btn-warning">Editar</a></td>';
			echo '<td><a href="deletar.php?id_evento='.$id_evento.'"  class="btn btn-danger">Deletar</a></td>';
			echo '</tr>'; // ao sair do foreach, fecho a linha da tabela
		}
		echo '</table>'; // ao sair do while, significa que não ha mais registros para exibir. entao fecho a tabela
	}
	else
	{
		echo '<h3 class="alert alert-info">Não há eventos agendados</h3>';
	}


	?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>