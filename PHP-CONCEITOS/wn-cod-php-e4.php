<?php
$varSair = 0;
$varMenorNumero = 0;
$varMaiorNumero = 0;

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
