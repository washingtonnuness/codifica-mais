<div class="modal-header">
    <h5 class="modal-title">Cadastrar Novo Produto</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
</div>

<form action="index.php?page=produtos/salvar" method="POST" enctype="multipart/form-data">

    <div class="modal-body">

        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label">Nome *</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Preço *</label>
                <input type="number" step="0.01" class="form-control" name="preco" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Quantidade *</label>
                <input type="number" class="form-control" name="quantidade" min="0" value="1" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Imagem (opcional)</label>
                <input type="file" class="form-control" name="imagem" accept="image/*">
            </div>
            <div class="col-12">
                <label class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" rows="3"></textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar Produto</button>
    </div>
</form>