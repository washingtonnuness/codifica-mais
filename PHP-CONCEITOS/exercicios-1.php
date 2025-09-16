<?php
//solicita que o usuario digite o nome
echo ("Digite teu nome: ");
//$nome = trim(fgets(STDIN));
$nome = readline();

//solicita que o usuário digite a idade

echo "Digite sua idade";
$idate = trim(fgets(STDIN));


//Exibe a mensagem formatada


echo "$nome tem $idade anos de idade \n";
