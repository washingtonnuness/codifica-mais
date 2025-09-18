<?php
//instanciado variavis notas e soma com valor 0
$nota = 0;
$soma = 0;

//Variavel para loop
$repeticaoLoop = 3;

//Variavel para definir a média do 
$calculoMedia = 3;

//Inicia o for com contador em 1
for($cont = 1 ; $cont < $repeticaoLoop + intval(1); $cont++){
    //Solicita que o usuario informe uma nota referência no contador atual para não digirar primeiro segundo e terceiro
    $nota = readline("Digite a Nota $cont : ".PHP_EOL);
    //Atribui a nota digita na váriavel soma e armazena.
    $soma += $nota;
    //Aguarda o contador chegar em 3 para inciar a condição abaixo. chegando faz os calculos de média .
    if($cont == $repeticaoLoop){
        //atribui na variavel result e divide pelo valor do contador como o valor do contador é 3 então a média é 3 .
        //Se aumentar o número de repetições  muda o valor da média.
        $result = $soma / $calculoMedia;

        //Verifica se aluno teve média menor que 6 e exibe o valor reprovador. 
        if($result < 6 ){
            echo "Voce obteve média $result".PHP_EOL;
            echo "Nao foi desta vez continue estudando !!!".PHP_EOL;

        //se a média for maior ele está aprovado !!!     
        }elseif ($result>=6){
            //exibe mensagem de Aprovado 
            echo "Parabéns tua média foi $result está Aprovado !!!!".PHP_EOL;
        }
    }
}