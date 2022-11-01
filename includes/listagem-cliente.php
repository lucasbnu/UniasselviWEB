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
  foreach($clientes as $cliente){
    $resultados .= '<tr>
                      <td>'.$cliente->id_cliente.'</td>
                      <td>'.$cliente->nome_cliente.'</td>
                      <td>'.$cliente->idade.'</td>
                      <td>'.($cliente->situacao == 's' ? 'Ativo' : 'Inativo').'</td>
                      <td>
                        <a href="editar-cliente.php?id_cliente='.$cliente->id_cliente.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir-cliente.php?id_cliente='.$cliente->id_cliente.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhuma cliente encontrada
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$mensagem?>

  <section>
    <a href="cadastrar-cliente.php">
      <button class="btn btn-success">Novo Cliente</button>
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