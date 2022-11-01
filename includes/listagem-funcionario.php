<?php

  $mensagem = '';
  if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
  }

  $resultados = '';
  foreach($funcionarios as $funcionario){
    $resultados .= '<tr>
                      <td>'.$funcionario->id_funcionario.'</td>
                      <td>'.$funcionario->nome_funcionario.'</td>
                      <td>'.$funcionario->idade.'</td>
                      <td>'.($funcionario->situacao == 's' ? 'Ativo' : 'Inativo').'</td>
                      <td>
                        <a href="editar-funcionario.php?id_funcionario='.$funcionario->id_funcionario.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir-funcionario.php?id_funcionario='.$funcionario->id_funcionario.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum funcionario encontrada
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$mensagem?>

  <section>
    <a href="cadastrar-funcionario.php">
      <button class="btn btn-success">Novo funcionario</button>
    </a>
  </section>

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>Identificador</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Status</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            <?=$resultados?>
        </tbody>
    </table>

  </section>


</main>