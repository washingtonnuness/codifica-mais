<?php

$tabuada = readline("Digite um numero para fazer a tabuada.: ");

for($contador=0; $contador < 11; $contador++){
    $result = $tabuada * $contador;
    if(strlen($result) == 1){
        echo "Tabuada de $tabuada X $contador \té \t= 0$result".PHP_EOL;
    }else{

        echo "Tabuada de $tabuada X $contador \té \t= $result".PHP_EOL;
    }
}