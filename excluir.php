<?php

require __DIR__.'/vendor/autoload.php';

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
if(isset($_POST['excluir'])){

  $obcliente->excluir();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';