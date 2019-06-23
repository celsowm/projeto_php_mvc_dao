<?php

function autoloader($class) {
    $fqcn = str_ireplace('App\\', '', $class);
    //var_dump($fqcn);
    include_once $fqcn . '.php';
}

spl_autoload_register('autoloader');


