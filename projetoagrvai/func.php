<?php  

function msg()
{
	if(!empty($_GET['msg']))
	{
		$msg = $_GET['msg'];

		if($msg == 'camposVazios')
			echo '<h3 class="alert alert-warning">Preencha todos os campos do formulário.</h3>';

		else if($msg == 'cadSucesso')
			echo '<h3 class="alert alert-success">Cadastro efetuado com sucesso!</h3>';

		else if($msg == 'cadErro')
			echo '<h3 class="alert alert-danger">Usuário ou e-mail já cadastrados!</h3>';
	
		else if($msg == 'loginErro')
			echo '<h3 class="alert alert-warning">Usuário, e-mail ou senha inválidos!<br><p>Tente novamente</p></h3>';
		
		else if($msg == 'eventoCad')
			echo '<h3 class="alert alert-success">Evento cadastrado com sucesso!</h3>';
	
		else if($msg == 'eventoErro')
			echo '<h3 class="alert alert-danger">Não foi possível cadastrar o evento.<br><p>Tente novamente</p></h3>';

		else if($msg == 'editSucesso')
			echo '<h3 class="alert alert-success">Evento editado com sucesso.</h3>';

		else if($msg == 'editErro')
			echo '<h3 class="alert alert-danger">Evento ja agendado.</h3>';

		else if($msg == 'deleteSucesso')
			echo '<h3 class="alert alert-success">Evento excluído.</h3>';

		else if($msg == 'deleteFail')
			echo '<h3 class="alert alert-warning">Falha ao apagar evento.</h3>';

		else if($msg == 'deleteFail2')
			echo '<h3 class="alert alert-danger">Não foi possível excluir o evento.</h3>';

		else if($msg == 'senhaErro')
			echo '<h3 class = "alert alert-warning">Senha incorreta.</h3>';
		
	}
}

?>