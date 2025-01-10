<?php

namespace src ;
use Exception;

class Router {

    const ROUTES = [
        'GET' => [
            '/calendrier'=>'CalendrierController',
            ''=>'CalendrierController',

        ],
        'POST'=>[
            ''=>'',
            ''=>''
        ]
    ];

    public function __construct(){}

    public function handleRouting($fullUri,$httpMethod){
        $params = parse_url($fullUri);
        $query = $params["query"];
        $path = $params["path"]; 

        $routeExist = isset(self::ROUTES[$httpMethod][$path]);

        if(!$routeExist){
            throw new Exception("Error Processing Request", 1);
        }

        echo self::ROUTES[$httpMethod][$path];
    }
}