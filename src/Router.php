<?php

namespace src;

use Exception;
use src\connection\Config;

class Router
{
  private $siteConfig;
  private $routes;
  // const ROUTES = [
  //   "GET" => [
  //     "/projet-Doriane/calendrier" => "src\\Controllers\\CalendrierController",
  //     "/projet-Doriane/modules" => "src\\Controllers\\ModulesController",
  //     "/projet-Doriane/" => "src\\Controllers\\CalendrierController",
  //   ],
  //   "POST" => [
  //     "/projet-Doriane/calendrier/" => "src\\Controllers\\CalendrierController",
  //     "/projet-Doriane/modules" => "src\\Controllers\\ModulesController",
  //     "/projet-Doriane/" => "src\\Controllers\\CalendrierController",
  //   ],
  // ];

  public function __construct()
  {
    $this->siteConfig = Config::getConfig("site");
    $this->routes = [
      "GET" => [
        $this->siteConfig["rootUrl"] .
        "/calendrier" => "src\\Controllers\\CalendrierController",
        $this->siteConfig["rootUrl"] .
        "/modules" => "src\\Controllers\\ModulesController",
        $this->siteConfig["rootUrl"] .
        "/" => "src\\Controllers\\CalendrierController",
      ],
      "POST" => [
        $this->siteConfig["rootUrl"] .
        "/calendrier/" => "src\\Controllers\\CalendrierController",
        $this->siteConfig["rootUrl"] .
        "/modules" => "src\\Controllers\\ModulesController",
        $this->siteConfig["rootUrl"] .
        "/" => "src\\Controllers\\CalendrierController",
      ],
    ];
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

    $routeExist = isset($this->routes[$httpMethod][$path]);

    if (!$routeExist) {
      throw new Exception("Cette route n'existe pas", 1);
    }

    $controllerName = $this->routes[$httpMethod][$path];

    return $controllerName;
  }
}
