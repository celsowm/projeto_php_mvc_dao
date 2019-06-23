<?php

use App\Model\Dao\EditoraDao;
use App\Model\Entity\Editora;

include '..\autoload.php';
//require 'App\Model\Entity\Editora.php';

$editora1 = new Editora();

$editoraDao = new EditoraDao();
var_dump($editoraDao->recuperar());