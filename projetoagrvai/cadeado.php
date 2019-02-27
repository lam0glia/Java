<?php session_start();
if(empty($_SESSION['usuario']) || 
   empty($_SESSION['senha'])   || 
   empty($_SESSION['email'])   ||
   empty($_SESSION['id_usuario']))
{
	header('location:login.php');
}
?>