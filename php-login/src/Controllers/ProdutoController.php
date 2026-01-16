<?php

namespace Vendor\App\Controllers;

use Vendor\App\Models\Produto;

use PDO;
use DateTimeImmutable;
use BASE_PATH;

class ProdutoController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->pdo = $pdo;
    }

    public function inserirProduto(Produto $produto)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO produtos 
            (imagem, nome, preco, quantidade, atualizado_em, status)
            VALUES (?, ?, ?, ?, ?, ?);"
        );
        return $stmt->execute([
            $produto->getImagem(),
            $produto->getNome(),
            $produto->getPreco(),
            $produto->getQuantidade(),
            $produto->getDescricao(),
            (new DateTimeImmutable())->format('Y-m-d H:i:s'),
            $produto->isAtivo() ? 1 : 0
        ]);
    }
    public function listarTodos()
    {
        return $this->pdo
            ->query("SELECT * FROM produtos ORDER BY nome ASC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }


    public function atualizarProduto(int $id, Produto $produto): bool
    {
        $stmt = $this->pdo->prepare("
        UPDATE produtos SET 
            imagem = COALESCE(?, imagem),
            nome = ?,
            preco = ?,
            quantidade = ?,
            atualizado_em = NOW(),
            status = ?
        WHERE id = ?
    ");

        $success = $stmt->execute([
            $produto->getImagem(),
            $produto->getNome(),
            $produto->getPreco(),
            $produto->getQuantidade(),
            $produto->isAtivo() ? 1 : 0,
            $id
        ]);

        if (!$success) {
            error_log("Erro ao atualizar produto ID $id: " . print_r($stmt->errorInfo(), true));
        }

        return $success;
    }
    public function excluir(int $id): bool
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM produtos WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }

    public function buscarPorId(int $id): ?array
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM produtos WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /* ================= UPLOAD IMAGEM ================= */

    public function uploadImagem(array $file): ?string
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid('produto_', true) . '.' . $ext;

        // $destino = __DIR__ . '/../public/imagens/produtos/' . $nomeArquivo;
        // $destino2 = '/public/imagens/produtos/';
        // print_r(__DIR__ . '/../..');

        $destino = dirname(__DIR__, 2) . '/public/imagens/produtos/' . $nomeArquivo;
        $destino2 = '/public/imagens/produtos/';
        //subindo 2 niveis de diretorio
        //print_r(dirname(__DIR__, 2));


        if (!is_dir(dirname($destino))) {
            mkdir(dirname($destino), 0777, true);
        }

        if (move_uploaded_file($file['tmp_name'], $destino)) {
            return $nomeArquivo;
        }

        return null;
    }

    /* ================= IMPORTAÇÃO CSV ================= */

    public function importarCSV(string $arquivoCsv): int
    {
        if (!file_exists($arquivoCsv)) {
            return 0;
        }

        $arquivo = fopen($arquivoCsv, 'r');
        $count = 0;

        // pula cabeçalho
        fgetcsv($arquivo, 1000, ';');

        while (($dados = fgetcsv($arquivo, 1000, ';')) !== false) {
            [$nome, $preco, $quantidade, $status] = $dados;

            $produto = new Produto(
                nome: $nome,
                preco: (float) $preco,
                quantidade: (int) $quantidade,
                status: (bool) $status
            );

            if ($this->inserirProduto($produto)) {
                $count++;
            }
        }

        fclose($arquivo);
        return $count;
    }
}
