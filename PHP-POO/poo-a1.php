<?php

class ContaBancaria
{
    private string $numeroConta;
    private string $titularConta;
    private float $saldo;

    public function __construct($numeroConta, $titularConta, $saldoInicial){
        $this-> numeroConta = $numeroConta;
        $this->titular = $titularConta;
        $this->saldo = $saldo;
    }

    public function depositar(float $quantia): void {
        if ($quantia > 0) {
            $this->saldo += $quantia;
        }
    }

    public function sacar(float $quantia): void {
        if ($quantia > 0 && $quantia <= $this->saldo) {
            $this->saldo -= $quantia;
        }
    }

    public function exibirSaldo(): float {
        return $this->saldo;
    }
}

