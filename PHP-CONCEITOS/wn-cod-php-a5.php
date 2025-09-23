<?php

$valorPeso = readline("Digite teu peso para Calcular IMC.: " . PHP_EOL);
$valorAltura = readline("Digite tua altura para calcuar IMC.: " . PHP_EOL);

$imc = 0;

function calculadoraIMC($valorPeso, $valorAltura)
{
    $imc = $valorPeso / ($valorAltura * $valorAltura);
    if ($imc < 18.5) {
        echo "O valor do teu IMC foi de.: $imc" . PHP_EOL;
        echo "Classificado como Magreza !!!" . PHP_EOL;
    }else if ($imc >= 18.5 && $imc <= 24.9) {
        echo "O valor do teu IMC foi de.: $imc" . PHP_EOL;
        echo "Classificado como Normal !!!" . PHP_EOL;
    }if ($imc >= 25 && $imc <= 29.9) {
        echo "O valor do teu IMC foi de.: $imc" . PHP_EOL;
        echo "Classificado como Sobrepeso !!!" . PHP_EOL;
    }if ($imc >= 30 && $imc <= 34.9) {
        echo "O valor do teu IMC foi de.: $imc" . PHP_EOL;
        echo "Classificado como Obesidade grau I !!!" . PHP_EOL;
    }if ($imc >= 35 && $imc <= 39.9) {
        echo "O valor do teu IMC foi de.: $imc" . PHP_EOL;
        echo "Classificado como Obesidade grau I !!!" . PHP_EOL;
    } else {
        echo "O valor do teu IMC foi de.: $imc" . PHP_EOL;
        echo "Classificado como Obesidade grau III !!!" . PHP_EOL;
    }
}

$result = calculadoraIMC($valorPeso, $valorAltura);
