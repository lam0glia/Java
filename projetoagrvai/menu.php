<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}
if(empty($_SESSION['usuario']) && empty($_SESSION['senha']))
{ 

	$itens = '<li class="nav-item active">
        		<a class="nav-link" href="cadastro.php">Cadastrar-se</a>
      		  </li>
			  <li class="nav-item active">
        		<a class="nav-link" href="login.php">Entrar</a>
      		  </li>';
    $caixa ='';
}
else
{

	$itens = '<li class="nav-item active">
        		<a class="nav-link" href="lista_desejos.php">Lista de desejos</a>
      		  </li>
			  <li class="nav-item active">
        		<a class="nav-link" href="logout.php">Sair</a>
      		  </li>';

    $caixa = '<form class="form-inline my-2 my-lg-0" action="pesquisar.php" method="post">
      			<input class="form-control mr-sm-2" type="search" name="pesquisar" placeholder="Pesquisar..." aria-label="Search">
      			<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Pesquisar</button>
    		  </form>';
} ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
        		<a class="nav-link" href="index.php">Início <span class="sr-only">(current)</span></a>
      		</li>
      		<?php echo $itens; ?>
    	</ul>
    	<?php echo $caixa; ?>
    	
  	</div>
</nav><br>