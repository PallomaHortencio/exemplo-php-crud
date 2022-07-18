<?php
// exportar-pdf.php

/* use CrudDiversos\Utilitarios; */

use Dompdf\Dompdf;
use Dompdf\Options;

require 'vendor/autoload.php';

session_start(); // inicializando a session
/* Utilitarios::teste($_SESSION['dados']); */



$paragrafo = "";
/* outra forma de fazer sem depender do recurso utilitarios */
foreach($_SESSION['dados'] as $fabricante){
    // .= é um operador de concatenação e atribuição
    $paragrafo .= "<p>". $fabricante['nome'] ."</p>";
}
 

// conteúdo HTML para o resumo usando sintaxe heredoc PHP
$data = date("d/m/Y");
$conteudo = <<<HTML
    <div style="border: solid 2px; padding: 10px; width: 70%; margin: auto">
    <h2>Resumo de Fabricantes - $data </h2>
    $paragrafo
    </div>

HTML;

// echo $conteudo;
// die(); // faz parar o script aqui

//$dompdf = new Dompdf();

/* 
nesta sintaxe não funcionou
$options = $dompdf->getOptions();
$options->setDefaultFont('Courier');
$dompdf->setOptions($options); */


$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);

$dompdf->loadHtml($conteudo);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("Resumo de Fabricantes.pdf");

