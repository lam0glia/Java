<?php  
// constantes de conexão com bd
define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'bd_agenda');

$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);

// Checar a conexão
if (!$conn) 
{ // se não conseguiu conectar
    // 'mate' a conexão:
    die("Erro ao conectar: " . mysqli_connect_error());
}

?>