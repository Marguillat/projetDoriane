<?php

namespace src\Models;

use src\connection\DataBase;
use src\connection\Config;
class TeacherModel
{
 

  /**
   * @return array
   */
  public static function getTeachers(): array
  {

     $config = Config::getConfig("db");

     if ($config['type'] == "mysql"){
        $concatfunc = "GROUP_CONCAT";
     }else{
        $concatfunc = "string_agg";
     }

    try {
      $db = DataBase::connect();
      $query = $db->prepare("SELECT
      t.id,t.lastname,t.firstname,t.email,t.description,
      {$concatfunc}(m.nom,';') as moduleList
      from teacher as t
      left join module_teacher as mt on t.id = mt.id_teacher
      left join module as m on mt.id_module = m.id
      GROUP BY t.id;
      ;");

      $query->execute();

      $result = $query->fetchAll();

      return $result;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public static function addTeacher($newTeacher): void
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare("INSERT 
        INTO teacher  
          (lastname,firstname,email)
        VALUES 
          (:lastname,:firstname,:email)
      ");

      $query->bindParam(":lastname", $newTeacher["nom"]);
      $query->bindParam(":firstname", $newTeacher["prenom"]);
      $query->bindParam(":email", $newTeacher["email"]);

      $query->execute();
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public static function deleteTeacher($teacherId): void
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare("DELETE FROM teacher WHERE id = :id ");

      $query->bindParam(":id", $teacherId);

      $query->execute();
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public static function addModulesToTeacher($teacherId, $moduleIds): void
  {
    try {
      $db = DataBase::connect();

      // on supprime tout avant de tout réécrire
      $deleteQuery = $db->prepare("DELETE FROM module_teacher WHERE id_teacher = :teacherId");
      $deleteQuery->bindParam(":teacherId", $teacherId);
      $deleteQuery->execute();

      if (!empty($moduleIds)) {
        $insertQuery = $db->prepare("INSERT INTO module_teacher (id_teacher, id_module) VALUES (:teacherId, :moduleId)");

        foreach ($moduleIds as $moduleId) {
          $insertQuery->bindParam(":teacherId", $teacherId);
          $insertQuery->bindParam(":moduleId", $moduleId);
          $insertQuery->execute();
        }
      }
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
