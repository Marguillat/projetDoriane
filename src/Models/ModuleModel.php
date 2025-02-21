<?php

namespace src\Models;

use src\connection\DataBase;

class ModuleModel{

    public static function getModules(){
        try {
            $db = DataBase::connect();
            $query = $db->prepare(
                "SELECT 
                    m.id, m.nom, m.description, m.duration,
                        (SELECT 
                        SUM((lesson.time_end - lesson.time_start)/10000) 
                        FROM lesson INNER JOIN module ON lesson.id_module = module.id 
                        WHERE m.id = lesson.id_module 
                        GROUP BY module.id
                        )as alocatedDuration, 
                    m.color,m.is_option
                    FROM module as m;
            ");

            $query->execute();

            $result = $query->fetchAll();

            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
// SELECT 
// m.id, m.nom, m.description, m.duration,
// 	(SELECT SUM((lesson.time_end - lesson.time_start)/10000) 
//      FROM lesson INNER JOIN module ON lesson.id_module = module.id 
//      WHERE m.id = lesson.id_module 
//      GROUP BY module.id
//     )as alocatedDuration, 
// m.color,m.is_option
// FROM module as m;