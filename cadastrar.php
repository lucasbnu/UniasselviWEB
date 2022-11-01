<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar cliente');

use \App\Entity\cliente;
$obcliente = new cliente;

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){

  $obcliente->titulo    = $_POST['titulo'];
  $obcliente->descricao = $_POST['descricao'];
  $obcliente->ativo     = $_POST['ativo'];
  $obcliente->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';