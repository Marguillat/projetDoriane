<?php

namespace src\Controllers;

/**
 * Main render hold global rendering variables
 */
abstract class RenderController {

    public $baseUrl;

    protected function __construct()
    {
       $this->baseUrl = self::makeBaseUrl(); 
    }

    private function makeBaseUrl(){
        $protocol = $_SERVER["REQUEST_SCHEME"];
        $servHost = $_SERVER["HTTP_HOST"];

        return $protocol.'://'.$servHost;
    }
}