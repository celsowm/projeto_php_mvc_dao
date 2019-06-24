<?php

include_once 'App/autoload.php';

$path= $_SERVER['PATH_INFO'];

define('ROOT', $_SERVER['DOCUMENT_ROOT']
        .DIRECTORY_SEPARATOR
        .'projeto_php_mvc_dao'
        .DIRECTORY_SEPARATOR);

$dispatch = new \App\Core\Router\Dispacher();
$dispatch->dispatch();