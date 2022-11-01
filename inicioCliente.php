<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\cliente;

$clientes = cliente::getclientes();
include __DIR__.'/includes/menu.php';
include __DIR__.'/includes/header-cliente.php';
include __DIR__.'/includes/listagem-cliente.php';
include __DIR__.'/includes/footer-cliente.php';