<?php


// $celcios = readline("Digite o valor em Celcios para converter em Fahrenheit: ");

// $fahrenheit = readline(
//     "Digite o valor em Fahrenheit para converter em Celcios: "
// );
// $TF = $celcios * (9 / 5) + 32;
// $TC = ($fahrenheit - 32) * (5 / 9);

$resultadoConversao = 0;


// echo "Temperatura em Fahrenheit $TF" . PHP_EOL;
// echo "Temperatura em Celcios $TC" . PHP_EOL;


function converteTemperatura($valorTemperatura, $unidadeConversao)
{
    if ($unidadeConversao == "C") {
        $resultadoConversao = $valorTemperatura * (9 / 5) + 32;
    } else if ($unidadeConversao == "F") {
        $resultadoConversao = ($valorTemperatura - 32) * (5 / 9);
    } else {
        echo "Valor da Conversão incorreto;" . PHP_EOL;
        echo "Digite F para Fahrenheit e C para Celcios" . PHP_EOL;
    }

    return $resultadoConversao;
}

$valorTemperatura = readline("Digite o valor em converter.: ");
$unidadeConversao = readline("Digite a unidade para conversão F ou C .: ");

$unidadeConversao = strtoupper($unidadeConversao);
$result = converteTemperatura($valorTemperatura, $unidadeConversao);


echo "Valor convertida" $result . PHP_EOL;