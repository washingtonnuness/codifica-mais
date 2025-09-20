<?php

$varNumA = readline("Dite o primeiro valor.: \n");

$varNumB = readline("Dite o Segundo valor.: \n");

$somaAB = 0;

if ($varNumA < $varNumB) {

    for ($cont = $varNumA; $cont <= $varNumB; $cont++) {
        if ($cont % 2 != 0) {
            $somaAB += $cont;
            echo "Valor impares é .: $cont" . PHP_EOL;
        }
    }
    echo "Valor total da soma dos impares no intervalo $varNumA e $varNumB é de .: $somaAB" . PHP_EOL;
} else {
    echo "O primeiro valor precisa ser menor que o segundo tente novamente .";
    $varNumA = readline("Dite o primeiro valor.: \n");

    $varNumB = readline("Dite o Segundo valor.: \n");
    if ($varNumA < $varNumB) {

        for ($cont = $varNumA; $cont <= $varNumB; $cont++) {
            if ($cont % 2 != 0) {
                $somaAB += $cont;
                echo "Valor impares é .: $cont" . PHP_EOL;
            }
        }
    }
}
