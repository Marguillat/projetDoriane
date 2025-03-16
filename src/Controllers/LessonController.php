<?php

namespace src\Controllers;

use Exception;
use src\connection\DataBase;

class LessonController
{
  public function updateLessonDate($moduleId, $date, $timeStart, $timeEnd)
  {
    try {
      new DataBase;
      $db = DataBase::connect();
      $query = $db->prepare("UPDATE lesson SET date = :date, time_start = :timeStart, time_end = :timeEnd WHERE id_module = :moduleId");
      $query->bindParam(':date', $date);
      $query->bindParam(':timeStart', $timeStart);
      $query->bindParam(':timeEnd', $timeEnd);
      $query->bindParam(':moduleId', $moduleId);
      $query->execute();

      return ['success' => true];
    } catch (Exception $e) {
      return ['success' => false, 'message' => $e->getMessage()];
    }
  }
}
