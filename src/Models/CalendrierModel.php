<?php

namespace src\Models;

use src\connection\DataBase;

class CalendrierModel
{
  /**
   * Get all sessions
   *
   * @return array List of sessions
   */
  public static function getSessions(): array
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare(
        "SELECT
                    l.id,m.nom,l.is_hp,l.date,l.time_start,l.time_end,m.color
                        FROM lesson as l
                        INNER JOIN module as m ON l.id_module = m.id
                        INNER JOIN session as s ON m.id_session = s.id
                        INNER JOIN class as c ON m.id_class = c.id
                        INNER JOIN grade as g on c.id_grade = g.id
                        ORDER BY date ASC, time_start ASC
            "
      );

      $query->execute();

      $result = $query->fetchAll();

      return $result;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
