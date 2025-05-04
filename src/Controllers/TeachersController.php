<?php

namespace src\Controllers;

use DateTime;
use src\Models\ClassModel;
use src\Models\ModuleModel;
use src\Models\TeacherModel;

class TeachersController extends RenderController
{
  private $dbTeachers;
  private $dbClasses;
  private $dbModules;

  // in case of POST request
  private $newPost;

  public function __construct()
  {
    parent::__construct();

    if (!empty($_POST)) {
      $this->newPost = $_POST;
    }

    if ($_POST["_method"] == "post") {
      if (
        !empty($this->newPost) &&
        isset($this->newPost["prenom"]) &&
        isset($this->newPost["classe"]) &&
        isset($this->newPost["module"]) &&
        isset($this->newPost["heures"]) &&
        isset($this->newPost["nom"])
      ) {
        TeacherModel::addTeachers($this->newPost);
      }
    } elseif ($_POST["_method"] == "delete") {
      if (!empty($this->newPost) && isset($this->newPost["module-id"])) {
        ModuleModel::deleteModule($this->newPost["module-id"]);
      }
    }

    $this->dbTeachers = TeacherModel::getTeachers();
    $this->dbClasses = ClassModel::getAllClasses();
    $this->dbModules = ModuleModel::getModules();

    $teachers = $this->dbTeachers;
    $classes = $this->dbClasses;
    $modules = $this->dbModules;

    require "src/Views/partials/header.phtml";
    require "src/Views/teachers.phtml";
  }
}
