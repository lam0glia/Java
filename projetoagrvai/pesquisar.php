<?php include 'cadeado.php'; ?>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title>Pesquisa</title>
</head>
<body class="container-fluid">
    <?php include 'menu.php'; ?>
           <h3 class="text-dark">Resultado da pesquisa.</h3>
    <?php

    include 'connect.php';


    $pesquisar = $_POST['pesquisar'];
    $id_usuario = $_SESSION['id_usuario'];

    $sql = "SELECT id_produto, produto , preco, link
            FROM tb_produto
            WHERE produto LIKE '%$pesquisar%' OR preco LIKE '%$pesquisar%' OR link LIKE '%$pesquisar%'
            LIMIT 5";

    $resultado = mysqli_query($connect, $sql);

    if(mysqli_affected_rows($connect) > 0 )
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
                        echo '<td><a href="' .$valor_atual. '">Link</a></td>';
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
        echo '<p> <h4 class="alert alert-dark">Produto não encontrado</h4></p>';
    }


?>
</body>
</html>