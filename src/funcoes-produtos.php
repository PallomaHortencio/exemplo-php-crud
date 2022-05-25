<?php
require_once "conecta.php";

function lerProdutos(PDO $conexao) {
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