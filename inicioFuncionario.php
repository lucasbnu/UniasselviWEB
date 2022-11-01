<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\funcionario;

$funcionarios = funcionario::getfuncionarios();

include __DIR__.'/includes/header-funcionario.php';
include __DIR__.'/includes/listagem-funcionario.php';
include __DIR__.'/includes/footer-funcionario.php';