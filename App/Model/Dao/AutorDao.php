<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Dao;

/**
 * Description of AutorDao
 *
 * @author celso
 */
class AutorDao extends AbstractDao {
    //put your code here
    public function recuperarPorLivro($livro_id): array {
        $query = "SELECT autor.* FROM autor "
                . "INNER JOIN autor_livro "
                . "ON autor.id = autor_livro.autor_id "
                . "WHERE livro_id = ?";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$livro_id]);
        return $statement->fetchAll(\PDO::FETCH_CLASS, 'App\Model\Entity\Autor');
    }
}
