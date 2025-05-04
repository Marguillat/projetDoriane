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

    if (isset($_POST["_method"]) && $_POST["_method"] == "post") {
      if (
        !empty($this->newPost) &&
        isset($this->newPost["prenom"]) &&
        isset($this->newPost["email"]) &&
        isset($this->newPost["nom"])
      ) {
        TeacherModel::addTeacher($this->newPost);
      }
    } elseif (isset($_POST["_method"]) && $_POST["_method"] == "delete") {
      if (!empty($this->newPost) && isset($this->newPost["teacher-id"])) {
        TeacherModel::deleteTeacher($this->newPost["teacher-id"]);
      }
    } elseif (isset($_POST["_method"]) && $_POST["_method"] == "update") {
      if (!empty($this->newPost) && isset($this->newPost["teacher-id"])) {
        $teacherId = $this->newPost["teacher-id"];
        $moduleIds = isset($this->newPost["modules"]) ? $this->newPost["modules"] : [];
        TeacherModel::addModulesToTeacher($teacherId, $moduleIds);
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
