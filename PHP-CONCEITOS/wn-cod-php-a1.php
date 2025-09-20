<?php

$valorTotal = 0; 

$valorTotalConta = readline("Digite o valor total da conta.: \n");

$valorGorjeta = readline("Digite o valor da % da gorjeta.: \n");

$valorTotal += $valorTotalConta + ($valorTotalConta * ($valorGorjeta / 100));

echo "Valor total da conta + gorjeta de $valorGorjeta foi de  $valorTotal \n";