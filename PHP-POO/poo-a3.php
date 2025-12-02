<?php

class Funcionario {
    private $nome;
    private $cargo;
    private $salario;

    public function __construct($nome, $cargo, $salario) {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = max(0, $salario);
    }

    public function alterarCargo($novoCargo) {
        $this->cargo = $novoCargo;
    }

    public function alterarSalario($novoSalario) {
        if ($novoSalario < 0) return;
        $this->salario = $novoSalario;
    }

    public function exibirDetalhes() {
        echo "Nome: {$this->nome}<br>";
        echo "Cargo: {$this->cargo}<br>";
        echo "Salário: R$ {$this->salario}<br>";
    }
}

$func = new Funcionario("Ana Silva", "Assistente", 2500);
$func->alterarCargo("Analista");
$func->alterarSalario(3500);
$func->exibirDetalhes();

$funcNaruto = new Funcionario("Naruto da Silva", "Hokage", 2300);
$funcNaruto->alterarCargo("Junior");
$funcNaruto->alterarSalario(3500);
$funcNaruto->exibirDetalhes();

$funcLuffy = new Funcionario("Moneky D. Luffy", "Capitao", 4500);
$funcLuffy->alterarCargo("Pirata");
$funcLuffy->alterarSalario(6500);
$funcLuffy->exibirDetalhes();