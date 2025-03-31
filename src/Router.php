<?php

namespace src;

use Exception;
use src\connection\Config;

class Router
{
  private $siteConfig;

  const ROUTES = [
    "GET" => [
      "/projet-Doriane/calendrier" => "src\\Controllers\\CalendrierController",
      "/projet-Doriane/modules" => "src\\Controllers\\ModulesController",
      "/projet-Doriane/" => "src\\Controllers\\CalendrierController",
    ],
    "POST" => [
      "/projet-Doriane/calendrier/" => "src\\Controllers\\CalendrierController",
      "/projet-Doriane/modules" => "src\\Controllers\\ModulesController",
      "/projet-Doriane/" => "src\\Controllers\\CalendrierController",
    ],
  ];

  public function __construct()
  {
    $this->siteConfig = Config::getConfig("site");
  }

  /**
   * @return string
   * @param mixed $fullUri
   * @param mixed $httpMethod
   */
  public function handleRouting($fullUri, $httpMethod): string
  {
    $params = parse_url($fullUri);
    $query = "";
    if (!empty($params["query"])) {
      $query = $params["query"];
    }
    $path = $params["path"];

    $routeExist = isset(self::ROUTES[$httpMethod][$path]);

    if (!$routeExist) {
      throw new Exception("Cette route n'existe pas", 1);
    }

    $controllerName = self::ROUTES[$httpMethod][$path];

    return $controllerName;
  }
}
