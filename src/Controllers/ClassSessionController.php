<?php

namespace src\Controllers;

use src\Models\ClassModel;
use src\Models\SessionModel;

class ClassSessionController extends RenderController
{
  private $dbClasses;
  private $dbSessions;

  private $newPost;

  public function __construct()
  {
    parent::__construct();

    if (!empty($_POST)) {
      $this->newPost = $_POST;
    }
    // [TODO] add class add session query
    if (isset($_POST["_method"]) && $_POST["_method"] == "post_class") {
      if (
        !empty($this->newPost) &&
        isset($this->newPost["nom"]) &&
        isset($this->newPost["id_grade"])
      ) {
        ClassModel::addClass($this->newPost);
      }
    } elseif (isset($_POST['_method']) && $_POST["_method"] == "delete_class") {
      if (!empty($this->newPost) && isset($this->newPost["class-id"])) {
        ClassModel::deleteClass($this->newPost["class-id"]);
      }
    } elseif (isset($_POST["_method"]) && $_POST["_method"] == "post_session") {
      if (
        !empty($this->newPost) &&
        isset($this->newPost["nom"]) &&
        isset($this->newPost["date_debut"]) &&
        isset($this->newPost["date_fin"]) &&
        isset($this->newPost["id_class"])
      ) {
        SessionModel::addSession($this->newPost);
      }
    } elseif (isset($_POST['_method']) && $_POST["_method"] == "delete_session") {
      if (!empty($this->newPost) && isset($this->newPost["session-id"])) {
        SessionModel::deleteSession($this->newPost["session-id"]);
      }
    }


    $this->dbClasses = ClassModel::getAllClasses();
    $this->dbSessions = SessionModel::getAllSessions();

    $classes = $this->dbClasses;
    $sessions = $this->dbSessions;

    // Chargement des vues
    require "src/Views/partials/header.phtml";
    require "src/Views/class_session.phtml";
  }
}
