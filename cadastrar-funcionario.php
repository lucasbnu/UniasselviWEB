<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar funcionario');

use \App\Entity\funcionario;
$obfuncionario = new funcionario;

//VALIDAÇÃO DO POST
if(isset($_POST['nome_funcionario'],$_POST['idade'],$_POST['situacao'])){

  $obfuncionario->nome_funcionario    = $_POST['nome_funcionario'];
  $obfuncionario->idade = $_POST['idade'];
  $obfuncionario->situacao     = $_POST['situacao'];
  $obfuncionario->cadastrar();

  header('location: inicioFuncionario.php?status=success');
  exit;
}

include __DIR__.'/includes/header-funcionario.php';
include __DIR__.'/includes/formulario-funcionario.php';
include __DIR__.'/includes/footer-funcionario.php';