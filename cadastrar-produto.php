<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar produto');

use \App\Entity\produto;
$obproduto = new produto;

//VALIDAÇÃO DO POST
if(isset($_POST['descricao_produto'],$_POST['preco'],$_POST['situacao'])){

  $obproduto->descricao_produto    = $_POST['descricao_produto'];
  $obproduto->preco = $_POST['preco'];
  $obproduto->situacao     = $_POST['situacao'];
  $obproduto->cadastrar();

  header('location: inicioProduto.php?status=success');
  exit;
}

include __DIR__.'/includes/header-produto.php';
include __DIR__.'/includes/formulario-produto.php';
include __DIR__.'/includes/footer-produto.php';