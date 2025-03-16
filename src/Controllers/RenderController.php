<?php

namespace src\Controllers;

use src\connection\Config;

/**
 * Main render hold global rendering variables
 *blabal
 */
abstract class RenderController
{
    public $baseUrl;
    public $siteInfo;

    protected function __construct()
    {
        $this->baseUrl = self::makeBaseUrl();
        $this->siteInfo = Config::getConfig('site');
    }

    private function makeBaseUrl(): string
    {
        $protocol = 'http';
        if (array_key_exists("REQUEST_SCHEME", $_SERVER) && !empty($_SERVER["REQUEST_SCHEME"])) {
            $protocol = $_SERVER["REQUEST_SCHEME"];
        }
        $servHost = $_SERVER["HTTP_HOST"];

        return $protocol . "://" . $servHost;
    }
}
