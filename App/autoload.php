<?php

function autoloader($class) {
    $fqcn = str_ireplace('DB2TPHP\\', '', $class);
    //var_dump($fqcn);
    include_once $fqcn. '.php';
}

spl_autoload_register('autoloader');


