<?php

class ContaBancaria
{
    private string $numeroConta;
    private string $titularConta;
    private float $saldo;

    public function __construct($numeroConta, $titularConta, $saldo){
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
        if ($quantia > 0 && $this->saldo >= $quantia) {
            $this->saldo -= $quantia;
        }
        else {
            echo "Saldo insuficiente para realizar transacao: R$ ".$this->saldo. PHP_EOL;
            echo "Valor do saque: R$ ".$quantia. PHP_EOL;
        }
    }

    public function exibirSaldo(): float {
        return $this->saldo;
    }
}



$conta = new ContaBancaria("12345-6", "João da Silva", 100);

$conta->depositar(200);
$conta->sacar(50);

echo "Saldo atual: R$ " . $conta->exibirSaldo(). PHP_EOL;

$contaID = '147258-9';
$nomeFulano = 'Washington Nunes';
$valor = 500;

$washingtonConta = new ContaBancaria($contaID, $nomeFulano, $valor);

$washingtonConta->depositar(225);
$washingtonConta->sacar(755);

echo "Saldo atual: R$ " . $washingtonConta->exibirSaldo(). PHP_EOL;