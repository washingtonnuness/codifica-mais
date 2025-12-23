<?php

namespace Vendor\App\Models;

use PDO;
use PDOException;

class Database
{
    private $usuario = 'washington';
    private $senha = 'washington';
    private $dataBase = 'sistema_login';
    private $host = 'localhost';
    private $porta = 3306;
    private ?PDO $pdo = null;

    public function getConexao(): PDO
    {
        if ($this->pdo === null) {
            try {
                $dsn = "mysql:host={$this->host};port={$this->porta};dbname={$this->dataBase};charset=utf8mb4";
                $this->pdo = new PDO($dsn, $this->usuario, $this->senha, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                throw new \Exception("Falha na conexão: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}
