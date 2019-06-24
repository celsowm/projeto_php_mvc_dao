<?php

namespace App\Core\Connection;

use \PDO;

class Connection {

    //put your code here
    private $pdo = null;
    private static $singleton = null;

    private function __construct() {

        $options = [];
        $dsn = "";
        $arquivo = file_get_contents(ROOT."App\Config\connection.json");
        $json = json_decode($arquivo, true);

        switch ($json['driver']) {
            case 'mysql':

                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false, //para funcionar bind no limit
                ];

                $porta = 3306;
                $dsn = "mysql:host={$json['server']};port=3306;dbname={$json['database']};charset=utf8";



                break;

            case 'pgsql':


                break;

            case 'mssql':


                break;

            case 'oci':


                break;


            default:
                break;
        }

        try {

            $this->pdo = new \PDO($dsn, $json['user'], $json['password'], $options);
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
            
        }
    }

    public static function getInstance() {
        if (!isset(self::$singleton)) {
            self::$singleton = new static();
        }
        return self::$singleton;
    }

    public function getPdo(): ?\PDO {
        return $this->pdo;
    }

}

//Exemplo de uso:
//$pdo = Conexao::getInstance()->getPdo();