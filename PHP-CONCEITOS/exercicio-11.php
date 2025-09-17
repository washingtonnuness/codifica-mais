<?php


for($contador = 0; $contador <=10 ; $contador++){
    
    echo PHP_EOL;
    echo "Tabuada de $contador".PHP_EOL;

    for($contador2 = 0; $contador2 <=10 ; $contador2++){
        $result = $contador * $contador2;
        echo "Tabuada de $contador X $contador2 = $result".PHP_EOL;
    }
}