<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Core\SQLDialect;

use InvalidArgumentException;
use PDO;

/**
 * Description of SQLDialectFactory
 *
 * @author celso
 */
class SQLDialectFactory {

    //put your code here
    public static function get(PDO $pdo) : AbstractSQLDialect {

        switch ($pdo->getAttribute(PDO::ATTR_DRIVER_NAME)) {
            case 'mysql':
                return new MySQLDialect();
            case 'pgsql':
                return new PostgreSQLDialect();
            case 'sqlsrv':
                return new MsSQLDialect();
            case 'oci':
                return new OracleSQLDialect();
            default:
                throw InvalidArgumentException("Sem dialeto");
        }
    }

}
