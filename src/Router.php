<?php

namespace src ;

use Exception;

class Router {


    const ROUTES = [
        'GET' => [
            '/projet-Doriane/calendrier/'=>'src\\Controllers\\CalendrierController',
            '/projet-Doriane/'=>'src\\Controllers\\CalendrierController',

        ],
        'POST'=>[
            ''=>'',
            ''=>''
        ]
    ];

    public function __construct(){}

    public function handleRouting($fullUri,$httpMethod){
        $params = parse_url($fullUri);
        $query = '';
        if(!empty($params["query"])){
            $query = $params["query"];
        }
        $path = $params["path"]; 

        $routeExist = isset(self::ROUTES[$httpMethod][$path]);
        
        if(!$routeExist){
            throw new Exception("Error Processing Request", 1);
        }

        $controllerName = self::ROUTES[$httpMethod][$path];

        return $controllerName;
    }
}