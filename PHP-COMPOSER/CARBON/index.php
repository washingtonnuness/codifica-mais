<?php
require 'vendor/autoload.php';

use Carbon\Carbon;
use Carbon\CarbonImmutable;

use Nette\Forms\Form;

$dt = Carbon::now()->setlocale('pt-br');

echo '<link rel="stylesheet" type="text/css" href="./src/style.css">';

$form = new Form;
$form->addText('nome', 'Nome completo')
    ->setRequired();
$form->addDate('data_nascimento', 'Data Nascimento:')
    ->setRequired();

$form->addSubmit('send', 'Enviar');

$form->render();


if ($form->isSuccess()) {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];

    $dataHoje = Carbon::now('America/Sao_Paulo');
    //$nascimento = Carbon::createMidnightDate(1987, 3, 14, 'America/Sao_Paulo');
    //Qual a diferença das duas formas createMid e Fromdate ?
    $nascimento = Carbon::createFromDate($data_nascimento, 'America/Sao_Paulo');
    //echo Carbon::now('America/Vancouver')->diffInSeconds(Carbon::now('Europe/London')); // 4.0E-6
    echo "<div class='content'>";
    echo "<h1> Seja bem vindo, {$nome}</h1>";
    echo "<h2>Aqui algumas informações !!! </h2>";
    echo "<h3>Dias proximo aniversario</h3>";
    echo "<div class = 'respostas'>" . $dataHoje->diffInDays(Carbon::createFromDate(2026, 3, 14, 'America/Sao_Paulo')) . "</div>";
    echo "<h3>Calcular quantos anos de vida você tem</h3>";
    echo "<div class = 'respostas'>" . $nascimento->diffInYears($dataHoje) . "</div>";
    echo "<h3>Calcular quantos dias de vida você tem</h3>";
    echo "<div class = 'respostas'>" . $nascimento->diffInDays($dataHoje) . "</div>";
    echo "<h3>Mostrar que dia da semana você nasceu</h3>";
    echo "<div class = 'respostas'>" . $nascimento->dayName . "</div>";

    echo "</div>";
    $form->close();
}
