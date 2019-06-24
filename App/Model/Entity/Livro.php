<?php

namespace App\Model\Entity;

class Livro {
    
    public $id;
    public $titulo;
    public $isbn;
    public $edicao;
    public $ano;
    public $preco;
    public $editora;
    public $autores = [];
    
}

