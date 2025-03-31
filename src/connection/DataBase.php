<?php

namespace src\connection;

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
  private static $type;

  public function __construct()
  {
    $dbConfig = Config::getConfig("db");
    self::$host = $dbConfig["host"];
    self::$dbname = $dbConfig["dbname"];
    self::$login = $dbConfig["login"];
    self::$pwd = $dbConfig["pwd"];
    self::$type = $dbConfig["type"];
  }

  public static function connect(): PDO
  {
    if (empty(self::$_instance)) {
      $dbHander = new PDO(
        self::$type . ":host=" . self::$host . ";dbname=" . self::$dbname,
        self::$login,
        self::$pwd
      ); //Connexion via PDO
      $dbHander->exec("SET NAMES 'utf8'"); //Activation de l'UTF8
      $dbHander->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      self::$_instance = $dbHander;
    }
    return self::$_instance;
  }
}
