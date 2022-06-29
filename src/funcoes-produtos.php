<?php
require_once "conecta.php";

function lerProdutos(PDO $conexao):array {
/* $sql = "SELECT id, nome, descricao, preco, quantidade, fabricantes_id FROM produtos ORDER BY nome"; */
$sql = "SELECT produtos.id, produtos.nome, produtos.preco, produtos.descricao, produtos.quantidade, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes ON produtos.fabricantes_id = fabricantes.id ORDER BY fabricantes.nome";

try {
    $consulta = $conexao->prepare($sql);
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
} catch(Exception $erro) {
    die("Erro: " . $erro->getMessage());
} return $resultado;

}


function inserirProduto(PDO $conexao, string $nome, float $preco, int $quantidade, string $descricao, int $fabricantesId):void {
//Void indica sem retorno

    $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao, fabricantes_id) VALUES(:nome, :preco, :quantidade, :descricao, :fabricantes_id)";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta->bindParam(':preco', $preco, PDO::PARAM_STR);
        $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $consulta->bindParam(':fabricantes_id', $fabricantesId, PDO::PARAM_INT);

        $consulta->execute();

    } catch (Exception $erro) {
        die("Erro: " .$erro->getMessage());
    }

}
 
   
   function lerUmProduto(PDO $conexao, int $id):array {
    $sql = "SELECT id, nome, preco, quantidade, descricao, fabricantes_id FROM produtos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    }   catch (Exception $erro) {
        die("Erro: " .$erro->getMessage());
    }
    return $resultado;
}


/* Atualizar */
function atualizarProduto(PDO $conexao, int $id, string $nome, float $preco, int $quantidade, string $descricao, int $fabricantesId) {
  $sql = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao, fabricantes_id = :fabricantes_id WHERE id = :id";

  try {
    $consulta = $conexao->prepare($sql);
    $consulta->bindParam(':id', $id, PDO::PARAM_INT);
    $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
    $consulta->bindParam(':preco', $preco, PDO::PARAM_STR);
    $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
    $consulta->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $consulta->bindParam(':fabricantes_id', $fabricantesId, PDO::PARAM_INT);

    $consulta->execute();

} catch (Exception $erro) {
    die("Erro: " .$erro->getMessage());
}

}


/* Excluir */
function excluirProduto(PDO $conexao, int $id):void {
    $sql = "DELETE FROM produtos WHERE id = :id";
  
    try {
      $consulta = $conexao->prepare($sql);
      $consulta->bindParam(':id', $id, PDO::PARAM_INT);;
  
      $consulta->execute();
  
  } catch (Exception $erro) {
      die("Erro: " .$erro->getMessage());
  }
  
  }

/*  Funções Utilitarias */

function formataMoeda(float $valor):string {
    return "R$ ".number_format($valor, 2, ",", ".");
} /* 2 jeito */

    function dump($dados){
        echo "<pre>";
        var_dump($dados);
        echo "</pre>";
    }

?>