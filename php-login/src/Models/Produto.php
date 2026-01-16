<?php

namespace Vendor\App\Models;

use DateTimeImmutable;

class Produto
{
    private int $id;
    private $imagem;
    private string $nome;
    private float $preco;
    private int $quantidade;
    private ?string $descricao;
    private ?DateTimeImmutable $atualizadoEm;
    private $status;

    public function __construct(
        int $id = 0,
        ?string $imagem = null,
        string $nome = '',
        float $preco = 0.0,
        int $quantidade = 0,
        ?string $descricao = null,
        ?DateTimeImmutable $atualizadoEm = null,
        bool $status = true
    ) {
        $this->id = $id;
        $this->imagem = $imagem;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->descricao = $descricao ?? '';
        $this->atualizadoEm = $atualizadoEm;
        $this->status = $status;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function setImagem(?string $imagem): self
    {
        $this->imagem = $imagem;
        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): self
    {
        $this->preco = $preco;
        return $this;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): self
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    public function getAtualizadoEm(): ?DateTimeImmutable
    {
        return $this->atualizadoEm;
    }

    public function setAtualizadoEm(?DateTimeImmutable $data): self
    {
        $this->atualizadoEm = $data;
        return $this;
    }

    public function isAtivo(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;
        return $this;
    }


    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
}
