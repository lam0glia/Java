<?php session_start();
if(empty($_SESSION['usuario']) || 
   empty($_SESSION['senha'])   || 
   empty($_SESSION['email']) )
{
	header('location:login.php');
}
?>