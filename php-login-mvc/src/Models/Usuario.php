<?php

namespace Vendor\App\Models;

class Usuario
{
    public function __construct(
        private int $id = 0,
        private string $nome = '',
        private string $email = '',
        private string $password = ''
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
