<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar cliente');

use \App\Entity\cliente;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A cliente
$obcliente = cliente::getcliente($_GET['id']);

//VALIDAÇÃO DA cliente
if(!$obcliente instanceof cliente){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){

  $obcliente->titulo    = $_POST['titulo'];
  $obcliente->descricao = $_POST['descricao'];
  $obcliente->ativo     = $_POST['ativo'];
  $obcliente->atualizar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';