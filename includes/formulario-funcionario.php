<main>

  <section>
    <a href="inicioFuncionario.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post">

    <div class="form-group">
      <label>Título</label>
      <input type="text" class="form-control" name="nome_funcionario" value="<?=$obfuncionario->nome_funcionario?>">
    </div>

    <div class="form-group">
      <label>Descrição</label>
      <textarea class="form-control" name="idade" rows="5"><?=$obfuncionario->idade?></textarea>
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
              <input type="radio" name="situacao" value="n" <?=$obfuncionario->situacao == 'n' ? 'checked' : ''?>> Inativo
            </label>
          </div>
      </div>

    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>