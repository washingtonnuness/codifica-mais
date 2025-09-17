<?php

$num1 = readline("Digite um numero .: ").PHP_EOL;

$num2 = readline("Digite o segundo numero .: ".PHP_EOL);


if($num1 < $num2){
    echo "O numero $num2 é maior que o $num1".PHP_EOL;
}else if($num1 == $num2){
    echo "Poxa voce digitou numeros iguais.".PHP_EOL;
}else{
    echo "O numero $num1 é maior que o $num2".PHP_EOL;
}