<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Dao;

/**
 * Description of LivroDao
 *
 * @author celso
 */
class LivroDao extends AbstractDao {
    //put your code here
    
    public function recuperar(): array {
        
        $autorDao = new AutorDao();
        
        $livros = [];
        $query = "SELECT livro.*, editora.nome "
                . "FROM livro "
                . "INNER JOIN editora ON "
                . "editora.id = livro.editora_id";
        
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        while($registro = $statement->fetch(\PDO::FETCH_LAZY)){
            $livro = $this->hydrate((array) $registro);
            $livro->autores = $autorDao->recuperarPorLivro($livro->id);
            $livros[] = $livro;
        }
        return $livros;
    }
    
    public function hydrate(array $array, $class_name = ""): ?object {
        $livro = parent::hydrate($array, $class_name);
        $livro->editora = parent::hydrate($array, 'App\\Model\\Entity\\Editora');
        return $livro;
    }
}
