<?php

namespace src\connection;

use Exception;
use src\connection\Config;
use PDO;

class DataBase
{

    //pas de duplication de connexion
    private static $_instance;

    private static $host;
    private static $dbname;
    private static $login;
    private static $pwd;

    public function __construct()
    {
        $dbConfig = Config::getConfig("mysql");
        self::$host = $dbConfig['host'];
        self::$dbname = $dbConfig['dbname'];
        self::$login = $dbConfig['login'];
        self::$pwd = $dbConfig['pwd'];
    }

    public static function connect()
    {

        if (empty(self::$_instance)) {
            $dbHander = new PDO(
                'mysql:host=' . self::$host . ';dbname=' . self::$dbname,
                self::$login,
                self::$pwd,
            );              //Connexion via PDO
            $dbHander->exec("SET NAMES 'utf8'");                                                                             //Activation de l'UTF8
            $dbHander->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::$_instance = $dbHander;
        }
        return self::$_instance;
    }
}
