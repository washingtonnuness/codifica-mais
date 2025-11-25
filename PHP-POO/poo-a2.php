<?php

class Produto {
    private string $nome;
    private float $preco;
    private int $quantidade;

    public function __construct(string $nome, float $preco, int $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = max(0, $quantidade);
    }

    public function alterarPreco(float $novoPreco): void {
        $this->preco = $novoPreco;
    }

    public function alterarQuantidade(int $novaQuantidade): void {
        if ($novaQuantidade < 0) {
            $this->quantidade = 0;
        } else {
            $this->quantidade = $novaQuantidade;
        }
    }

    public function exibirDetalhes(): void {
        echo "Produto: {$this->nome}\n";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "\n";
        echo "Quantidade: {$this->quantidade}\n";
    }
}

// ==== Teste ====

$produto = new Produto("Mouse Gamer", 150.00, 10);

$produto->alterarPreco(199.90);
$produto->alterarQuantidade(25);

$produto->exibirDetalhes();


$produtoVga = new Produto("GPU RX3070TI", 2150.00, 10);

$produtoVga->alterarPreco(199.90);
$produtoVga->alterarQuantidade(25);

$produtoVga->exibirDetalhes();

$produtoMemoria = new Produto("Memoria DDR5 65GB". 450.00, 4);

$produtoMemoria->alterarPreco(599.90);
$produtoMemoria->alterarQuantidade(14);

$produtoMemoria->exibirDetalhes();