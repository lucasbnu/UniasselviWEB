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
  foreach($produtos as $produto){
    $resultados .= '<tr>
                      <td>'.$produto->id_produto.'</td>
                      <td>'.$produto->descricao_produto.'</td>
                      <td>'.$produto->preco.'</td>
                      <td>'.($produto->situacao == 's' ? 'Ativo' : 'Inativo').'</td>
                      <td>
                        <a href="editar-produto.php?id_produto='.$produto->id_produto.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir-produto.php?id_produto='.$produto->id_produto.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>
                    </tr>';
  }

  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum produto encontrada
                                                       </td>
                                                    </tr>';

?>
<main>

  <?=$mensagem?>

  <section>
    <a href="cadastrar-produto.php">
      <button class="btn btn-success">Novo produto</button>
    </a>
  </section>

  <section>

    <table class="table bg-light mt-3">
        <thead>
          <tr>
            <th>Identificador</th>
            <th>Nome</th>
            <th>preço</th>
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