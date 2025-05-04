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
    $this->siteInfo = Config::getConfig("site");
    $this->baseUrl = self::makeBaseUrl();
  }

  private function makeBaseUrl(): string
  {
    $protocol = $this->siteInfo["protocol"];
    $servHost = $this->siteInfo["host"];
    $servPort = $this->siteInfo["port"];
    $servRootUrl = $this->siteInfo["rootUrl"];

    return $protocol . "://" . $servHost . $servPort . "/" . $servRootUrl;
  }
}
