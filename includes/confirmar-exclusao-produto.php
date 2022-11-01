<main>

  <h2 class="mt-3">Excluir produto</h2>

  <form method="post">

    <div class="form-group">
      <p>Você deseja realmente excluir o produto <strong><?=$obproduto->descricao_produto?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="inicioProduto.php">
        <button type="button" class="btn btn-success">Cancelar</button>
      </a>

      <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
    </div>

  </form>

</main>