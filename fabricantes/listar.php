<?php require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao) ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Lista</title>
</head>
<body>
    <div class="container">
        <h1>Fabricantes | SELECT - <a href="../index.php">Home</a></h1>
        <hr>
        <h2>Lendo e carregando todos os Fabricantes</h2>

        <p>
            <a href="inserir.php">
                Inserir um novo fabricante
            </a>
        </p>

        <?php if(isset($_GET['status']) && $_GET['status'] == 'sucesso') { ?>
        <p>Fabricante atualizado com sucesso!</p>
         <?php } ?>
        <table>
            <caption>Lista de Fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>
            <tbody>
<?php

/*   
 codigos na pagina de funcoes-fabricantes
 string com o comando SQL
 $sql = "SELECT id, nome FROM fabricantes";

 preparação do comando
 $consulta = $conexao->prepare($sql);

 execução do comando
 $consulta-> execute();

  capturar os resultados
 $resultado = $consulta-> fetchAll(PDO::FETCH_ASSOC); */



 
/*  var_dump($resultado); */ //teste

/*  echo "<pre>";
 var_dump($resultado); // teste
 echo "</pre>"; */


/* Exercício: 
ajuste o foreach para exibir cada dado em seu respectivo lugar, ou seja, o valor do id deve aparecer embaixo do cabeçalho id; e o valor do nome deve aparececr embaixo do cabeçalho nome. Tudo isso em cada linha gerada pelo foreach */


 foreach ($listaDeFabricantes as $fabricante) {
   /*  echo $fabricante['nome']; */

   ?>

   <tr>
       <td> <?=$fabricante["id"]?> </td>
       <td> <?=$fabricante["nome"]?> </td>
       <td><a href="atualizar.php?id=<?=$fabricante['id']?>"> Atualizar </a></td>
       <td>
         <!--  <a onclick="return confirm('Deseja realmente excluir?')" </a> -->
        <a class="excluir" href="excluir.php?id=<?=$fabricante['id']?>">Excluir</a></td>
   </tr>

   <?php
 }
   ?>
            </tbody>
        </table>
    </div>
  
    <script>
       const links = document.querySelectorAll('.excluir');
       for( let i = 0; i < links.length; i++ ){
           links[i].addEventListener("click", function(event){
               event.preventDefault();
               let resposta = confirm("Deseja realmente excluir?");
               if(resposta) location.href = links[i].getAttribute('href');
           });
       }
   </script>
    
</body>
</html>