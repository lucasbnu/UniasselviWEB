<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\produto;

$produtos = produto::getprodutos();

include __DIR__.'/includes/header-produto.php';
include __DIR__.'/includes/listagem-produto.php';
include __DIR__.'/includes/footer-produto.php';