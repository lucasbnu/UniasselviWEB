<main>

  <section>
    <a href="inicioProduto.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post">

    <div class="form-group">
      <label>Título</label>
      <input type="text" class="form-control" name="descricao_produto" value="<?=$obproduto->descricao_produto?>">
    </div>

    <div class="form-group">
      <label>Preço</label>
      <textarea class="form-control" name="preco" rows="5"><?=$obproduto->preco?></textarea>
    </div>

    <div class="form-group">
      <label>Status</label>

      <div>
          <div class="form-check form-check-inline">
            <label class="form-control">
              <input type="radio" name="situacao" value="s" checked> Ativo
            </label>
          </div>

          <div class="form-check form-check-inline">
            <label class="form-control">
              <input type="radio" name="situacao" value="n" <?=$obproduto->situacao == 'n' ? 'checked' : ''?>> Inativo
            </label>
          </div>
      </div>

    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>