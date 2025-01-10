<?php

namespace src\connection;

use Exception;
use src\connection\Config;
use PDO;

class DataBase{

    //pas de duplication de connexion
    private static $_instance;

    private $host;
    private $dbname;
    private $login;
    private $pwd;

    public function __construct()
    {
        $dbConfig = Config::getConfig("mysql");
        $this->host = $dbConfig['host'];
        $this->dbname = $dbConfig['dbname'];
        $this->login = $dbConfig['login'];
        $this->pwd = $dbConfig['pwd'];
    }

    public function connect(){

        if(empty(self::$_instance)){
            $dbHander = new PDO(
                'mysql:host='.$this->host.';dbname='.$this->dbname, 
                $this->login,
                $this->pwd,
            );              //Connexion via PDO
            $dbHander->exec("SET NAMES 'utf8'");                                                                             //Activation de l'UTF8
            $dbHander->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
            self::$_instance = $dbHander;
        }

        return self::$_instance;
    }

}