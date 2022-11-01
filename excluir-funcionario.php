<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\funcionario;

//VALIDAÇÃO DO id_funcionario
if(!isset($_GET['id_funcionario']) or !is_numeric($_GET['id_funcionario'])){
  header-funcionario('location: inicioFuncionario.php?status=error');
  exit;
}

//CONSULTA o funcionario
$obfuncionario = funcionario::getfuncionario($_GET['id_funcionario']);

//VALIDAÇÃO Do funcionario
if(!$obfuncionario instanceof funcionario){
  header-funcionario('location: inicioFuncionario.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obfuncionario->excluir();

  header-funcionario('location: inicioFuncionario.php?status=success');
  exit;
}

include __DIR__.'/includes/header-funcionario.php';
include __DIR__.'/includes/confirmar-exclusao-funcionario-funcionario.php';
include __DIR__.'/includes/footer-funcionario.php';