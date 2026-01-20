<?php
// public/index.php
require_once __DIR__ . '/../vendor/autoload.php';

// Inicia a sessão
session_start();

// Namespace das classes principais
use Vendor\App\Models\Database;
use Vendor\App\Models\Usuario;
use Vendor\App\Controllers\AuthController;
use Vendor\App\Controllers\ProdutoController;

//Diretorio de imagens

$dirImagens = __DIR__ . '/imagens/produtos';
// Conexão com o banco
$database = new Database();
$db = $database->getConexao();

// Instâncias dos modelos e controllers
$usuarioModel = new Usuario(); // Se você injetar PDO no modelo
$authController = new AuthController($db);


$produtoController  = new ProdutoController($db);
$page = $_GET['page'] ?? 'login';

// Roteamento simples e seguro
switch ($page) {

    // ===================================
    // LOGIN (página padrão)
    // ===================================
    case 'login':
    default:
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $senha = $_POST['senha'] ?? '';

            if ($authController->login($email, $senha)) {
                header("Location: index.php?page=dashboard");
                exit;
            } else {
                $erro = "E-mail ou senha inválidos.";
            }
        }
        include __DIR__ . '/../src/Views/login.php';
        break;

    // ===================================
    // REGISTRAR
    // ===================================
    case 'registrar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = trim($_POST['usuario'] ?? '');
            $email   = trim($_POST['email'] ?? '');
            $senha   = $_POST['senha'] ?? '';

            if ($authController->registrar($usuario, $email, $senha)) {
                // Login automático após registro
                if ($authController->login($email, $senha)) {
                    header("Location: index.php?page=dashboard");
                    exit;
                }
            } else {
                $erro = "Erro ao cadastrar. Tente novamente.";
            }
        }
        include __DIR__ . '/../src/Views/registrar.php';
        break;

    // ===================================
    // DASHBOARD (lista de usuários)
    // ===================================
    case 'dashboard':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }
        $usuarios = $authController->listarTodos();
        include __DIR__ . '/../src/Views/dashboard.php';
        break;

    // ===================================
    // DASHBOARD DE PRODUTOS
    // ===================================
    case 'produtos/dashboard':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }
        $usuarios = $authController->listarTodos();
        // Aqui você pode carregar produtos no futuro
        $produtos = $produtoController->listarTodos();
        include __DIR__ . '/../src/Views/Produtos/produtos.php';
        break;

    // ===================================
    // EDITAR PERFIL (apenas o próprio usuário)
    // ===================================
    case 'editar':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $idParaEditar = (int)($_GET['id'] ?? 0);

        if ($idParaEditar !== $_SESSION['user_id']) {
            die("Acesso negado: você só pode editar seu próprio perfil.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = trim($_POST['usuario'] ?? '');
            $email   = trim($_POST['email'] ?? '');
            $senha   = !empty($_POST['senha']) ? $_POST['senha'] : null;
            $editarProdutos   = trim($_POST['editarProdutos'] ?? '');

            if ($authController->atualizar($idParaEditar, $usuario, $email, $senha, $editarProdutos)) {
                $_SESSION['user_nome'] = $usuario;
                header("Location: index.php?page=dashboard&success=atualizado");
                exit;
            } else {
                $erro = "Erro ao atualizar perfil.";
            }
        }

        // Carrega dados atuais do usuário para o formulário
        $usuarioAtual = $authController->buscarPorId($idParaEditar);
        include __DIR__ . '/../src/Views/editar.php';
        break;

    // ===================================
    // EXCLUIR CONTA (apenas a própria)
    // ===================================
    case 'excluir':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $idExcluir = (int)($_GET['id'] ?? 0);

        if ($idExcluir === $_SESSION['user_id']) {
            $authController->deletarConta($idExcluir);
            session_destroy();
            header("Location: index.php?page=login&mensagem=conta_excluida");
            exit;
        } else {
            die("Ação não permitida.");
        }
        break;

    // ===================================
    // LOGOUT
    // ===================================
    case 'logout':
        $authController->logout();
        header("Location: index.php?page=login");
        exit;
        break;

    // ===================================
    // ROTAS Modal via htmx
    // ===================================
    case 'produtos/modal-adicionar':
        if (!isset($_SESSION['user_id'])) {
            http_response_code(403);
            exit;
        }
        include __DIR__ . '/../src/Views/Produtos/modal_adicionar.php';
        exit;

    case 'produtos/salvar':
        if (!isset($_SESSION['user_id'])) {
            http_response_code(403);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Upload da imagem
            $imagem = null;
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                //print_r('caiu aqui');
                $imagem = $produtoController->uploadImagem($_FILES['imagem']);
            }
            //var_dump($_POST);
            //var_dump($_FILES["imagem"]["name"]);
            // Cria e insere o produto
            $produto = new \Vendor\App\Models\Produto(
                nome: $_POST['nome'],
                preco: (float)$_POST['preco'],
                quantidade: (int)$_POST['quantidade'],
                imagem: $imagem,
                status: true
            );

            $sucesso = $produtoController->inserirProduto($produto);

            if ($sucesso) {
                // Redireciona para a página de listagem com mensagem de sucesso
                $produtos = $produtoController->listarTodos();
                header("Location: index.php?page=produtos/dashboard&msg=sucesso");
            } else {
                // Redireciona com erro
                header("Location: index.php?page=produtos/dashboard&msg=erro");
            }
            exit;
        }
        break;

    case 'modal-editar':
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?page=login");
            exit;
        }

        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            header("Location: index.php?page=produtos/dashboard&erro=id_invalido");
            exit;
        }

        $produtoAtual = $produtoController->buscarPorId($id);
        if (!$produtoAtual) {
            header("Location: index.php?page=produtos/dashboard&erro=produto_nao_encontrado");
            exit;
        }

        // Cria o objeto Produto com dados atuais
        $produto = new \Vendor\App\Models\Produto(
            id: $produtoAtual['id'],
            imagem: $produtoAtual['imagem'],
            nome: $produtoAtual['nome'],
            preco: (float)$produtoAtual['preco'],
            quantidade: (int)$produtoAtual['quantidade'],
            atualizadoEm: $produtoAtual['atualizado_em'] ? new DateTimeImmutable($produtoAtual['atualizado_em']) : null,
            status: (bool)$produtoAtual['status']
        );

        // Processa atualização via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Atualiza o objeto
            $produto->setNome(trim($_POST['nome'] ?? $produto->getNome()));
            $produto->setPreco((float)($_POST['preco'] ?? $produto->getPreco()));
            $produto->setQuantidade((int)($_POST['quantidade'] ?? $produto->getQuantidade()));
            $produto->setStatus(isset($_POST['status']) && $_POST['status'] === '1');

            // Upload nova imagem
            if (!empty($_FILES['imagem']['name']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $novaImagem = $produtoController->uploadImagem($_FILES['imagem']);
                if ($novaImagem) {
                    // Apaga antiga se existir
                    if ($produto->getImagem()) {
                        $caminhoAntigo = __DIR__ . '/../../public/imagens/produtos/' . $produto->getImagem();
                        if (file_exists($caminhoAntigo)) unlink($caminhoAntigo);
                    }
                    $produto->setImagem($novaImagem);
                }
            }

            // Atualiza no banco
            $sucesso = $produtoController->atualizarProduto($produto->getId(), $produto);

            if ($sucesso) {
                // REDIRECIONA (sem nada antes!)
                header("Location: index.php?page=produtos/dashboard&msg=produto_atualizado");
                exit;  // Sempre use exit depois de header
            } else {
                $erro = "Falha ao atualizar.";
            }
        }

        // Se não for POST → carrega o modal
        include __DIR__ . '/../src/Views/Produtos/modal_editar.php';
        exit;
}
