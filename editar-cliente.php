<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar cliente');

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
if(isset($_POST['nome_cliente'],$_POST['idade'],$_POST['situacao'])){

  $obcliente->nome_cliente    = $_POST['nome_cliente'];
  $obcliente->idade = $_POST['idade'];
  $obcliente->situacao     = $_POST['situacao'];
  $obcliente->atualizar();

  header('location: inicioCliente.php?status=success');
  exit;
}

include __DIR__.'/includes/header-cliente.php';
include __DIR__.'/includes/formulario-cliente.php';
include __DIR__.'/includes/footer-cliente.php';