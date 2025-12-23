<?php
// public/index.php
require_once __DIR__ . '/../vendor/autoload.php';

// Inicia a sessão
session_start();

use Vendor\App\Models\Usuario;
use Vendor\App\Controllers\AuthController;
use Vendor\App\Models\Database;

$database = new Database();
$db = $database->getConexao();

$usuarioModel = new Usuario();
$auth = new AuthController($db);

$page = $_GET['page'] ?? 'login';

// Roteamento
switch ($page) {
    case 'registrar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->registrar($_POST['usuario'], $_POST['email'], $_POST['senha']);
            header("Location: index.php?page=login");
        }
        include '../src/Views/registrar.php';
        break;

    case 'dashboard':
        // Proteção de rota: só logado acessa
        //session_start();
        if (!isset($_SESSION['user_id'])) header("Location: index.php");
        $usuarios = $auth->listarTodos();
        include __DIR__ . '/../src/Views/dashboard.php';
        break;

    case 'editar':
        if (!isset($_SESSION['user_id'])) header("Location: index.php");

        // Regra de Ouro: Só edita se o ID for o seu próprio
        $idParaEditar = (int)$_GET['id'];
        if ($idParaEditar !== $_SESSION['user_id']) {
            die("Acesso negado: Você só pode editar seu próprio perfil.");
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth->atualizar($idParaEditar, $_POST['nome'], $_POST['email']);
            $_SESSION['user_nome'] = $_POST['nome']; // Atualiza nome na sessão
            header("Location: index.php?page=dashboard");
        }
        include '../src/Views/editar.php';
        break;
    case 'excluir':
        $idExcluir = $_GET['id'] ?? null;

        // Segurança: Só permite excluir se o ID for o do próprio usuário logado
        if ($idExcluir && $idExcluir == $_SESSION['user_id']) {
            $auth->deletarConta($idExcluir);
            header("Location: index.php?page=login&mensagem=conta_excluida");
            exit;
        } else {
            die("Ação não permitida.");
        }
        break;
    case 'logout':
        $auth->logout();
        break;

    default: // Login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($auth->login($_POST['email'], $_POST['senha'])) {
                header("Location: index.php?page=dashboard");
            } else {
                $erro = "E-mail ou senha inválidos.";
            }
        }
        include '../src/Views/login.php';
        break;
}
// if ($page === 'registrar') {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         //var_dump($_POST);
//         $auth->registrar($_POST['usuario'], $_POST['email'], $_POST['senha']);
//         header("Location: index.php?page=login");
//     }
//     include __DIR__ . '/../src/Views/registrar.php';
// } elseif ($page === 'dashboard') {
//     //session_start();
//     if (!isset($_SESSION['user_id'])) header("Location: index.php");
//     $usuarios = $auth->listarTodos();
//     include __DIR__ . '/../src/Views/dashboard.php';
// } elseif ($page === 'editar') {
//     if (!isset($_SESSION['user_id'])) header("Location: index.php");
//     // Regra de Ouro: Só edita se o ID for o seu próprio
//     $idParaEditar = (int)$_GET['id'];
//     if ($idParaEditar !== $_SESSION['user_id']) {
//         die("Acesso negado: Você só pode editar seu próprio perfil.");
//     }
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $auth->atualizar($idParaEditar, $_POST['usuario'], $_POST['email']);
//         $_SESSION['user_nome'] = $_POST['usuario']; // Atualiza nome na sessão
//         header("Location: index.php?page=dashboard");
//     }

//     include __DIR__ . '/../src/Views/editar.php';
// } elseif ($page === 'logout') {
//     $auth->logout();
//     include __DIR__ . '/../src/Views/login.php';
// } else {
//     // Login por padrão
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//         if ($auth->login($_POST['email'], $_POST['senha'])) {
//             header("Location: index.php?page=dashboard");
//         } else {
//             $erro = "E-mail ou senha inválidos.";
//         }
//     }
//     include __DIR__ . '/../src/Views/login.php';
//     break;
// }
