<?php

namespace src\Controllers;

use DateTime;
use src\Models\ClassModel;
use src\Models\ModuleModel;

class ModulesController extends RenderController
{
  private $dbModules;
  private $dbClasses;

  // in case of POST request
  private $newPost;

  public function __construct()
  {
    parent::__construct();

    if (!empty($_POST)) {
      $this->newPost = $_POST;
    }

    if (isset($_POST["_method"]) && $_POST["_method"] == "post") {
      if (
        !empty($this->newPost) &&
        isset($this->newPost["nom"]) &&
        isset($this->newPost["classe"]) &&
        isset($this->newPost["color"]) &&
        isset($this->newPost["heures"])
      ) {
        ModuleModel::addModule($this->newPost);
      }
    } elseif (isset($_POST['_method']) && $_POST["_method"] == "delete") {
      if (!empty($this->newPost) && isset($this->newPost["module-id"])) {
        ModuleModel::deleteModule($this->newPost["module-id"]);
      }
    }

    $this->dbModules = ModuleModel::getModules();
    $this->dbClasses = ClassModel::getAllClasses();

    $modules = $this->dbModules;
    $classes = $this->dbClasses;

    require "src/Views/partials/header.phtml";
    require "src/Views/modules.phtml";
  }
}
