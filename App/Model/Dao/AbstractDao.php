<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Dao;

use App\Core\Connection\Connection;
use App\Core\SQLDialect\SQLDialectFactory;
use ReflectionClass;

/**
 * Description of AbstractDao
 *
 * @author celso
 */
abstract class AbstractDao {

    //put your code here
    protected $pdo;
    protected $sql;

    public function __construct() {
        $this->pdo = Connection::getInstance()->getPdo();
        $this->sql = SQLDialectFactory::get($this->pdo);
    }

    public function getTableName(): string {
        $dao_name = (new ReflectionClass($this))->getShortName();
        return str_ireplace("Dao", "", $dao_name);
    }

    public function recuperar(): array {

        $dados = [];
        $query = "SELECT * FROM {$this->getTableName()}";
        $statement = $this->pdo->query($query);
        while($dado = $statement->fetch(\PDO::FETCH_LAZY)){
            $dados[] = $this->hydrate((array)$dado);
        }
        return $dados;
    }
    
    public function recuperarPorId($id): array {

        $dados = [];
        $query = "SELECT * "
                . "FROM {$this->getTableName()} "
                . "WHERE id = ?";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$id]);
        while($dado = $statement->fetch(\PDO::FETCH_LAZY)){
            $dados[] = $this->hydrate((array)$dado);
        }
        return $dados;
    }
    
    protected function hydrate(array $array, $class_name = null) : ?object{
        
        if($class_name == null){
            $class_name = $this->getEntityClassName();
        }
        
        $reflection = new ReflectionClass($class_name);
        $object = $reflection->newInstanceWithoutConstructor();
        $list = $reflection->getProperties();
        foreach ($list as $prop) {
            $prop->setAccessible(true);
            if (isset($array[$prop->name])) {
                $prop->setValue($object, $array[$prop->name]);
            }
        }
        return $object;
        
    }

    public function getEntityClassName() {
        $dao_name = (new ReflectionClass($this))->getShortName();
        $short = str_ireplace("Dao", "", $dao_name);
        return 'App\\Model\\Entity\\'.$short;
    }

}
