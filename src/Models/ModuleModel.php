<?php

namespace src\Models;

use src\connection\DataBase;

class ModuleModel
{
  /**
   * @return array
   */
  public static function getModules(): array
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare("SELECT
      m.id,m.nom,m.id_class,m.id_session,m.description,m.duration,m.color,m.is_option,
      c.nom as className
      from module as m
      inner join class as c on m.id_class = c.id
      ;");

      $query->execute();

      $result = $query->fetchAll();

      return $result;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  /**
   * @param array $filters Optional filters to apply
   * @return array
   */
  public static function getModulesAlocated($filters = []): array
  {
    try {
      $db = DataBase::connect();
      
      $sql = "SELECT
                m.id, m.nom, m.description, m.duration,
                    (SELECT
                    SUM((lesson.time_end - lesson.time_start))
                    FROM lesson INNER JOIN module ON lesson.id_module = module.id
                    WHERE m.id = lesson.id_module
                    GROUP BY module.id
                    )as alocatedDuration,
                m.color, m.is_option
                FROM module as m
                INNER JOIN class as c ON m.id_class = c.id
                INNER JOIN grade as g ON c.id_grade = g.id
                INNER JOIN session as s ON m.id_session = s.id";
      
      $whereConditions = [];
      
      // Add filter conditions
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
  /**
   * @param mixed $newModule
   * @return void
   */
  public static function addModule($newModule): void
  {
    try {
      $db = DataBase::connect();

      $query = $db->prepare(
        "INSERT INTO module (id_class,id_session,nom, duration, color, is_option)
                VALUES (:id_class,:id_session,:nom, :duration, :color, :is_option);
            "
      );
      $defaultSession = 1;
      $query->bindParam(":nom", $newModule["nom"]);
      $query->bindParam(":id_class", $newModule["classe"]);
      $query->bindParam(":id_session", $defaultSession); //à modifier
      $query->bindParam(":duration", $newModule["heures"]);
      $query->bindParam(":color", $newModule["color"]);

      if (isset($newModule["is_option"])) {
        $optionBool = 1;
      } else {
        $optionBool = 0;
      }

      $query->bindParam(":is_option", $optionBool);
      $query->execute();
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  /**
   * @param mixed $moduleId
   * @return void
   */
  public static function deleteModule($moduleId): void
  {
    try {
      $db = DataBase::connect();

      $query = $db->prepare("DELETE FROM module WHERE id = :id");

      $query->bindParam(":id", $moduleId);
      $query->execute();
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}

// SELECT
//     m.id,
//     m.id_class,
//     m.id_session,
//     m.nom,m.description,
//     m.duration,m.color,
//     m.is_option,
// FROM module as m
