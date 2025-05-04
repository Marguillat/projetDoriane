<?php

namespace src\Models;

use src\connection\DataBase;

class TeacherModel
{
  /**
   * @return array
   */
  public static function getTeachers(): array
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare("SELECT
      t.id,t.lastname,t.firstname,t.email,t.description,
      string_agg(m.nom,';') as moduleList
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

  public static function addTeacher(): void {}
}

// SELECT
//     m.id,
//     m.id_class,
//     m.id_session,
//     m.nom,m.description,
//     m.duration,m.color,
//     m.is_option,
// FROM module as m
