<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Validator;

use App\Core\Connection\Connection;
use App\Core\SQLDialect\SQLDialectFactory;
use App\Model\Dao\AbstractDao;

/**
 * Description of AbstractValidator
 *
 * @author celso
 */
abstract class AbstractValidator {

    protected $sql;
    protected $pdo;
    protected $dao;

    public final function __construct(AbstractDao $dao) {
        $this->dao = $dao;
        $this->pdo = Connection::getInstance();
        $this->sql = SQLDialectFactory::get($this->pdo);
    }

    public function isValidDate($objeto) {
        
    }

    //source: https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40
    public function isValidCPF(string $cpf) : bool{

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }

    public function validateInsertOrUpdate($objeto) {
        $this->sql->getSchema($this->dao->getTableName());
    }

    //put your code here
    public function validateInsert(object $objeto) {
        
    }

    public function validateDelete() {
        
    }

    public function validateUpdate() {
        
    }

}
