<?php

namespace src\Models;
use src\connection\DataBase;

class LessonModel
{
  public static function saveLesson()
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare("");

      $query->execute();

      $result = $query->fetchAll();

      return $result;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  /**
   * Delete a session by ID
   *
   * @param mixed $idToDelete ID of the session to delete
   * @return void Result of the deletion operation
   */
  public static function deleteLesson($idToDelete)
  {
    $formatedId = htmlentities($idToDelete);
    try {
      $db = DataBase::connect();
      $query = $db->prepare("DELETE FROM lesson WHERE id = :idToDelete");
      $query->bindParam(":idToDelete", $formatedId);
      $query->execute();
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
