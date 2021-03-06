<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Model\Dao\EditoraDao;
use App\Model\Dao\LivroDao;

/**
 * Description of LivroController
 *
 * @author celso
 */
class LivroController extends AbstractController {
    //put your code here
    public function index(){
        $dao = new LivroDao();
        $livros = $dao->recuperar();
        $this->set(compact('livros'));
    }
    
    public function inserir(){
        $dao = new LivroDao();
        $editoraDao = new EditoraDao();
        
        $editoras = $editoraDao->getList('nome');
        
        if($_REQUEST){
            $livro = $dao->hydrate($_REQUEST);
            $dao->save($livro);
        }
        $this->set(compact('editoras'));
       
    }
}
