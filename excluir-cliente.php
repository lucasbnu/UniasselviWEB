<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\cliente;

//VALIDAÇÃO DO id_cliente
if(!isset($_GET['id_cliente']) or !is_numeric($_GET['id_cliente'])){
  header-cliente('location: inicioCliente.php?status=error');
  exit;
}

//CONSULTA A cliente
$obcliente = cliente::getcliente($_GET['id_cliente']);

//VALIDAÇÃO DA cliente
if(!$obcliente instanceof cliente){
  header-cliente('location: inicioCliente.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obcliente->excluir();

  header-cliente('location: inicioCliente.php?status=success');
  exit;
}

include __DIR__.'/includes/header-cliente.php';
include __DIR__.'/includes/confirmar-exclusao-cliente-cliente.php';
include __DIR__.'/includes/footer-cliente.php';