<?php

namespace src\Models;

use src\connection\DataBase;

class CalendrierModel
{
  public static function getSessions($filters = []): array
  {
    try {
      $db = DataBase::connect();

      $sql = "SELECT
                l.id, m.nom, l.is_hp, l.date, l.time_start, l.time_end, m.color
              FROM lesson as l
              INNER JOIN module as m ON l.id_module = m.id
              INNER JOIN session as s ON m.id_session = s.id
              INNER JOIN class as c ON m.id_class = c.id
              INNER JOIN grade as g on c.id_grade = g.id";

      $whereConditions = [];

      //Condition des différents filtres
      if (!empty($filters['class'])) {
        $whereConditions[] = "c.id = :class_id";
      }

      if (!empty($filters['grade'])) {
        $whereConditions[] = "g.id = :grade_id";
      }

      if (!empty($filters['session'])) {
        $whereConditions[] = "s.id = :session_id";
      }

      if (!empty($filters['teacher'])) {
        $sql .= " INNER JOIN module_teacher as mt ON m.id = mt.id_module";
        $whereConditions[] = "mt.id_teacher = :teacher_id";
      }

      // Add WHERE clause if there are conditions
      if (!empty($whereConditions)) {
        $sql .= " WHERE " . implode(" AND ", $whereConditions);
      }

      $sql .= " ORDER BY date ASC, time_start ASC";

      $query = $db->prepare($sql);

      // Bind parameters if they exist
      if (!empty($filters['class'])) {
        $query->bindParam(':class_id', $filters['class']);
      }

      if (!empty($filters['grade'])) {
        $query->bindParam(':grade_id', $filters['grade']);
      }

      if (!empty($filters['session'])) {
        $query->bindParam(':session_id', $filters['session']);
      }

      if (!empty($filters['teacher'])) {
        $query->bindParam(':teacher_id', $filters['teacher']);
      }

      $query->execute();

      $result = $query->fetchAll();

      return $result;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public static function getGrades(): array
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare("SELECT g.id, g.name as nom FROM grade as g ORDER BY nom ASC");
      $query->execute();
      return $query->fetchAll();
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public static function getClasses($gradeId = null): array
  {
    try {
      $db = DataBase::connect();
      $sql = "SELECT id, nom, id_grade FROM class";

      if ($gradeId) {
        $sql .= " WHERE id_grade = :grade_id";
      }

      $sql .= " ORDER BY nom ASC";

      $query = $db->prepare($sql);

      if ($gradeId) {
        $query->bindParam(':grade_id', $gradeId);
      }

      $query->execute();
      return $query->fetchAll();
    } catch (\Throwable $th) {
      throw $th;
    }
  }


  public static function getSessionYears(): array
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare("SELECT s.id, s.name as nom FROM session as s ORDER BY nom ASC");
      $query->execute();
      return $query->fetchAll();
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
