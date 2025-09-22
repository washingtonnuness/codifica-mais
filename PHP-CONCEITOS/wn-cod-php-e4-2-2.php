<?php
$varSair = 0;

$valorRecebido = [];
/*
while ($varSair != -1) {
    $varNumDigitado = readline("Digite um numero ou -1 para sair.: ");

    if ($varNumDigitado == -1) {
        echo "Muito obrigado programa encerrado com sucesso e gambiarra !!!" . PHP_EOL;
        //Poderia ter usado o break também mas ..
        $varSair = -1;
    } elseif ($varNumDigitado > $varMaiorNumero ) {
        $varMaiorNumero = $varNumDigitado;
    } else {
        $varMenorNumero = $varNumDigitado;
    }
    echo "o Menor número atual é $varMenorNumero" . PHP_EOL;
    echo "o Maior número atual é $varMaiorNumero" . PHP_EOL;
}
*/

function recebeValor($varSair)
{
    while ($varSair != -1) {
        $varNumDigitado = readline("Digite um numero ou -1 para sair.: ");
        if ($varNumDigitado == -1) {
            echo "Muito obrigado programa encerrado com sucesso e gambiarra !!!" . PHP_EOL;
            //$varSair = -1;
            break;
        }
        $valorRecebido[] = $varNumDigitado;
    }
    return $valorRecebido;
}

function calculaMaiorMenorValor($valorRecebido)
{
    $varMenorNumero = $valorRecebido[0];
    $varMaiorNumero = $valorRecebido[0];
    //$varMenorNumero = 0;
    //$varMaiorNumero = 0;
    // for ($cont = 0; $cont < count($valorRecebido); $cont++) {
    //     echo "$valorRecebido[$cont]" . PHP_EOL;
    //     if ($valorRecebido[$cont] > $valorRecebido[$cont + 1]) {
    //         $varMaiorNumero = $valorRecebido[$cont];
    //     }
    //     else {
    //         $varMenorNumero = $valorRecebido[$cont];
    //     }
    // }
    foreach ($valorRecebido as $numero) {
        if ($numero > $varMaiorNumero) {
            $varMaiorNumero = $numero; // Atualiza o maior valor
        }
        if ($numero < $varMenorNumero) {
            $varMenorNumero = $numero; // Atualiza o menor valor
        }
    }

    echo "o Menor número atual é $varMenorNumero" . PHP_EOL;
    echo "o Maior número atual é $varMaiorNumero" . PHP_EOL;
}

$resultado = recebeValor($varSair);
//echo $resultado;
print_r ($resultado);

calculaMaiorMenorValor($resultado);
