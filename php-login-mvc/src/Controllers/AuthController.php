<?php

namespace Vendor\App\Controllers;

use Vendor\App\Models\Usuario;
use PDO;

class AuthController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->pdo = $pdo;
    }

    public function login(string $email, string $senha)
    {

        $stmt = $this->pdo->prepare(
            "SELECT * FROM usuarios WHERE email = ?"
        );

        $stmt->execute([$email]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // $_SESSION['user'] = new Usuario(
            //     $usuario['id'],
            //     $usuario['nome'],
            //     $usuario['email']
            // );
            $_SESSION['user_id']   = $usuario['id'];
            $_SESSION['user_nome'] = $usuario['nome'];
            $_SESSION['user_email'] = $usuario['email'];
            return true;
        }
        return false;
    }

    public function registrar(string $usuario, string $email, string $senha)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?);"
        );

        return $stmt->execute([
            $usuario,
            $email,
            password_hash($senha, PASSWORD_DEFAULT)
        ]);
    }

    public function atualizar(int $id, string $usuario, string $email)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?"
        );

        return $stmt->execute([$usuario, $email, $id]);
    }

    public function listarTodos()
    {
        return $this->pdo
            ->query("SELECT id, nome, email FROM usuarios ORDER BY nome ASC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletarConta($id)
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM usuarios WHERE id = ?;"
        );

        // 2. Se o usuário deletado for o que está logado, desloga ele
        if ($id == $_SESSION['user_id']) {
            $stmt->execute([$id]);
            session_destroy();
            return true;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
    // private \PDO $pdo;
    // public function __construct($pdo)
    // {
    //     $this->pdo = $pdo;
    // }

    // public function salvar($nome, $email, $senha)
    // {
    //     $senhaEncript = password_hash($senha, PASSWORD_BCRYPT);
    //     $stemanet = $this->pdo->prepare(
    //         "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?);"
    //     );
    //     return $stemanet->execute([$nome, $email, $senhaEncript]);
    // }

    // public function listarTodos()
    // {
    //     return $this->pdo->query("SELECT id, nome, email FROM usuarios")->fetchAll(\PDO::FETCH_ASSOC);
    // }

    // public function atualizar($id, $nome, $email)
    // {
    //     $stmt = $this->pdo->prepare("UPDATE usuarios SET nome = ?, email = ? WHERE id = ?");
    //     return $stmt->execute([$nome, $email, $id]);
    // }

    // public function buscarPorEmail($email)
    // {
    //     $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    //     $stmt->execute([$email]);
    //     return $stmt->fetch(\PDO::FETCH_ASSOC);
    // }