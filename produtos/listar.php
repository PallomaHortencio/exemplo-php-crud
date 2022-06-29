<?php

use CrudPoo\Produto;

require_once "../vendor/autoload.php";

$produto = new Produto;

$listaDeProdutos = $produto->lerProdutos();
?>
<pre><?= var_dump($listaDeProdutos)?></pre>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
    <style>
        .atualizar { color:mediumturquoise;}
        .excluir { color:mediumturquoise; }
        .inserir { color:mediumturquoise;}
        .home { color:mediumturquoise;}
    </style>
</head>
<body>
    <div class="container">
        <h1>Produtos | SELECT - <a class="home" href="../index.php">Home</a></h1>
        <hr>
        <h2>Lendo e carregando todos os Produtos</h2>

        <p>
            <a class="inserir" href="inserir.php">
                Inserir um novo produto
            </a>
        </p>
    </div>

    <?php
    foreach ($listaDeProdutos as $produtos) {
    
    ?>

       <table>
    <tr>
        <td>
            <h3><a class="atualizar" href="atualizar.php?id=<?=$produtos["id"]?>">Atualizar</a></h3>
        </td>

        <td>
            <h3><a class="excluir" href="excluir.php?id=<?=$produtos["id"]?>">Excluir</a></h3>
        </td>
    </tr> 
    </table>



    <h3>Nome: <?=$produtos["nome"]?> </h3>
    <p>Preço: R$ <?=number_format($produtos["preco"], 2, ",", ".")?> </p> <!-- 1 jeito -->

    <!-- <p>Preço: <?=formataMoeda($produtos['preco'])?></p>  2 jeito com funcao, em funcoes-produtos.php -->

    <p>Quantidade: <?=$produtos["quantidade"]?> </p>
    <p>Descrição: <?=$produtos["descricao"]?> </p>
    <p>Fabricantes: <?=$produtos["fabricante"]?> </p>

 
    
    
 
    <?php
    };
    ?>
    
    
    <script src="../js/confirm.js"></script>

    
</body>
</html>