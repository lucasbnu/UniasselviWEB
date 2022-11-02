<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar produto');

use \App\Entity\produto;

//VALIDAÇÃO DO id_produto
if(!isset($_GET['id_produto']) or !is_numeric($_GET['id_produto'])){
  header-produto('location: inicioProduto.php?status=error');
  exit;
}

//CONSULTA o produto
$obproduto = produto::getproduto($_GET['id_produto']);

//VALIDAÇÃO do produto
if(!$obproduto instanceof produto){
  header-produto('location: inicioProduto.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['descricao_produto'],$_POST['preco'],$_POST['situacao'])){

  $obproduto->descricao_produto    = $_POST['descricao_produto'];
  $obproduto->preco = $_POST['preco'];
  $obproduto->situacao     = $_POST['situacao'];
  $obproduto->atualizar();

  header('location: inicioProduto.php?status=success');
  exit;
}

include __DIR__.'/includes/header-produto.php';
include __DIR__.'/includes/formulario-produto.php';
include __DIR__.'/includes/footer-produto.php';