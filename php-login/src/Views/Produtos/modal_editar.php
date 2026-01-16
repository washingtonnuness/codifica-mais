<div class="modal-header">
    <h5 class="modal-title">Editar Produto #<?= $produto->getId() ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<?php if (isset($erro)): ?>
    <div class="alert alert-danger m-3"><?= htmlspecialchars($erro) ?></div>
<?php endif; ?>

<form action="index.php?page=modal-editar&id=<?= $produto->getId() ?>" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
        <!-- Campos do formulário -->
        <div class="mb-3">
            <label class="form-label">Nome *</label>
            <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($produto->getNome()) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço *</label>
            <input type="number" step="0.01" name="preco" class="form-control" value="<?= $produto->getPreco() ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantidade *</label>
            <input type="number" name="quantidade" class="form-control" value="<?= $produto->getQuantidade() ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nova Imagem (opcional)</label>
            <?php if ($produto->getImagem()): ?>
                <div class="mb-2">
                    <img src="/imagens/produtos/<?= htmlspecialchars($produto->getImagem()) ?>" width="120" class="img-thumbnail">
                </div>
            <?php endif; ?>
            <input type="file" name="imagem" class="form-control" accept="image/*">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="status" value="1" class="form-check-input" id="status" <?= $produto->isAtivo() ? 'checked' : '' ?>>
            <label class="form-check-label" for="status">Produto Ativo</label>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </div>
</form>