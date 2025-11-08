<?php
require 'vendor/autoload.php';

use UserMeta\Html\Html;
use Carbon\Carbon;

echo "<h1> Bem vindo </h1>";

$form = new Html('form', ['method' => 'POST']);
$form->date(['name' => 'data_nascimento', 'label' => 'Data Nascimento']);
$form->submit('Enviar');
echo $form->render();

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataNascimento = $_POST['data_nascimento'];
}
echo  $dataNascimento = $_POST['data_nascimento'];

$nascimento = Carbon::createMidnightDate(1987, 3, 14, 'America/Sao_Paulo');
//Qual a diferença das duas formas createMid e Fromdate ?
$nascimento2 = Carbon::createFromDate(1987, 3, 14, 'America/Sao_Paulo');
$dataHoje = Carbon::now('America/Sao_Paulo')->toDateString();
//echo Carbon::now('America/Vancouver')->diffInSeconds(Carbon::now('Europe/London')); // 4.0E-6
echo "<ul>";
echo "<li>";
echo "<h3>Dias proximo aniversario</h3>";
echo Carbon::now('America/Sao_Paulo')->diffInDays(Carbon::createFromDate(2026, 3, 14, 'America/Sao_Paulo')) . '<br>';
echo "</li>";
echo "<li>";
echo "<h3>Calcular quantos anos de vida você tem</h3>";
echo $nascimento2->diffInYears($dataHoje) . '<br>';
echo "</li>";
echo "<li>";
echo "<h3>Calcular quantos dias de vida você tem</h3>";
echo  $nascimento2->diffInDays($dataHoje);
echo "</li>";
echo "<li>";
echo "<h3>Mostrar que dia da semana você nasceu</h3>";
echo $nascimento2->dayName . '<br>';
echo "</li>";
echo "</ul>";
