<?php

namespace src\connection;

class Config
{
  private static $configData;

  public static function getConfig(string $section): array
  {
    if (!self::$configData) {
      $configData = parse_ini_file(__DIR__ . "/../../config.ini", true);

      $askedConfig = $configData[$section];

      return $askedConfig;
    } else {
      return self::$configData[$section];
    }
  }
}
