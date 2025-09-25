<?php

// $itensComprados = [
//     "produto" => "Queijo",
//     "produto" => "Costela",
//     "produto" => "Faldinha",
//     "produto" => "Picanha"
// ];

// $precoProdutos = [
//     "preco" => 19.90,
//     "preco" => 29.90,
//     "preco" => 39.90,
//     "preco" => 69.90,

// ];
$pessoas = readline("Numero pessoas");

$precoProdutos = [
    19.90,
    29.90,
    39.90,
    69.90

];

$valorTotal = 0;

foreach ($precoProdutos as $preco) {
    $valorTotal += $preco;
}

echo $valorTotal . PHP_EOL;

$controle = count($precoProdutos);

// for ($cont = 0; $cont < $controle; $cont++) {
//     $valorTotal = $precoProdutos[$cont];
//     echo "Preco itens $precoProdutos[$cont]" . PHP_EOL;
// }
