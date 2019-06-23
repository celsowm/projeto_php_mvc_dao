<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Core\SQLDialect;

use App\Core\Connection\Connection;

/**
 * Description of AbstractSQLDialect
 *
 * @author celso
 */
abstract class AbstractSQLDialect {

    protected $pdo = null;

    public function __construct() {
        $this->pdo = Connection::getInstance()->getPdo();
    }

    public function getSchema($table): array {
        $query = "SELECT * FROM "
                . "information_schema.COLUMNS WHERE table_name= ?;";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$table]);
        return $statement->fetchAll();
    }

    public function getPrimaryKey($table): ?string {

        $query = " 
            SELECT
            KCU.COLUMN_NAME AS COLUMN_NAME
            FROM
            INFORMATION_SCHEMA.TABLE_CONSTRAINTS TC
            JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE KCU
            ON KCU.CONSTRAINT_SCHEMA = TC.CONSTRAINT_SCHEMA
            AND KCU.CONSTRAINT_NAME = TC.CONSTRAINT_NAME
            AND KCU.TABLE_SCHEMA = TC.TABLE_SCHEMA
            AND KCU.TABLE_NAME = TC.TABLE_NAME
            WHERE
            TC.CONSTRAINT_TYPE = 'PRIMARY KEY'       
            AND    KCU.TABLE_NAME =  ?";

        $statement = $this->pdo->prepare($query);
        $statement->execute([$table]);
        return $statement->fetchColumn();
    }

    public function getPaginatedStatement(string $query, int $limit, int $offset, string $order = 'id'): PDOStatement {

        $query_paginada = "$query ORDER BY $order OFFSET :offset "
                . "ROWS FETCH NEXT :limit ROWS ONLY";

        $statement = $this->pdo->prepare($query_paginada);
        $statement->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $statement->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        return $statement;
    }

    public function getUpdateStatement($id, object $object, string $table = null) {

        $schema = $this->getSchema($table);
        $pk = $this->getPrimaryKey($table);
        $columns_schema = array_column($schema, 'COLUMN_NAME');
        $update_values = [];
        $reflection = new \ReflectionClass($object);
        $properties = $reflection->getProperties();
        foreach ($properties as $property) {
            if (in_array($property->getName(), $columns_schema)) {
                $update_values[$property->getName()] = $property->getValue($novo_objeto);
            }
        }

        if ($update_values[$pk]) {
            unset($update_values[$pk]);
        }

        $update_array = array_map(function($v) {
            return "$v = :$v";
        }, array_keys($update_values));

        $sql = "UPDATE editora SET "
                . implode(', ', $update_array)
                . " WHERE $pk = :id";
        
        $statement = $this->pdo->prepare($sql);
        foreach ($update_values as $key => $value) {
            $statement->bindValue($key, $value);
        } 
        return $statement;
        
    }

}
