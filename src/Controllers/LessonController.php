<?php

namespace src\Controllers;

use Exception;
use src\connection\DataBase;

class LessonController
{
  public function addLessonDate($moduleId, $date, $timeStart, $timeEnd)
  {
    try {
      new DataBase();
      $db = DataBase::connect();
      $query = $db->prepare(`
        INSERT
          INTO lesson
            (id_module, date, time_start, time_end)
          VALUES
            (:moduleId, :date, :timeStart, :timeEnd)`);

      $query->bindParam(":date", $date);
      $query->bindParam(":timeStart", $timeStart);
      $query->bindParam(":timeEnd", $timeEnd);
      $query->bindParam(":moduleId", $moduleId);
      $query->execute();

      return ["success" => true];
    } catch (Exception $e) {
      return ["success" => false, "message" => $e->getMessage()];
    }
  }
}
