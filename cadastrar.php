<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar cliente');

use \App\Entity\cliente;
$obcliente = new cliente;

//VALIDAÇÃO DO POST
if(isset($_POST['nome_cliente'],$_POST['idade'],$_POST['situacao'])){

  $obcliente->nome_cliente    = $_POST['nome_cliente'];
  $obcliente->idade = $_POST['idade'];
  $obcliente->situacao     = $_POST['situacao'];
  $obcliente->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';