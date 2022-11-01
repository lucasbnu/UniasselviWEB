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

  header-cliente('location: inicioCliente.php?status=success');
  exit;
}

include __DIR__.'/includes/header-cliente.php';
include __DIR__.'/includes/formulario-cliente.php';
include __DIR__.'/includes/footer-cliente.php';