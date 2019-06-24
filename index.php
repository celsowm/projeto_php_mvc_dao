<?php

include_once 'App/autoload.php';

echo "<h1>Served Index file</h1>";

echo "Server Path </br>";

$path= $_SERVER['PATH_INFO'];

print_r($path);

// Then we split the path to get the corresponding controller and method to work with

echo "<br/><br/>Path Split<br/>";

print_r(explode('/', ltrim($path)));

var_dump($path);

$dispatch = new \App\Core\Router\Dispacher();
$dispatch->dispatch();