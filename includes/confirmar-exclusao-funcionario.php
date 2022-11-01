<main>

  <h2 class="mt-3">Excluir funcionario</h2>

  <form method="post">

    <div class="form-group">
      <p>Você deseja realmente excluir o funcionario <strong><?=$obfuncionario->nome_funcionario?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="inicioFuncionario.php">
        <button type="button" class="btn btn-success">Cancelar</button>
      </a>

      <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
    </div>

  </form>

</main>