<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar funcionario');

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
if(isset($_POST['nome_funcionario'],$_POST['idade'],$_POST['situacao'])){

  $obfuncionario->nome_funcionario    = $_POST['nome_funcionario'];
  $obfuncionario->idade = $_POST['idade'];
  $obfuncionario->situacao     = $_POST['situacao'];
  $obfuncionario->atualizar();

  header-funcionario('location: inicioFuncionario.php?status=success');
  exit;
}

include __DIR__.'/includes/header-funcionario.php';
include __DIR__.'/includes/formulario-funcionario.php';
include __DIR__.'/includes/footer-funcionario.php';