<?php

namespace src\Models;

use src\connection\DataBase;

class ModuleModel{

    public static function getModules(){
        try {
            $db = DataBase::connect();
            $query = $db->prepare(
                "SELECT * FROM module;"
            );

            $query->execute();

            $result = $query->fetchAll();

            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function getModulesAlocated(){
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

    public static function addModule($newModule){
        
        try {
            $db = DataBase::connect();

            $query = $db->prepare(
                "INSERT INTO module (id_class,id_session,nom, duration, color, is_option) 
                VALUES (:id_class,:id_session,:nom, :duration, :color, :is_option);
            ");
            $defaultSession = 1;
            $query->bindParam(':nom', $newModule['nom']);
            $query->bindParam(':id_class', $newModule['classe']);
            $query->bindParam(':id_session', $defaultSession); //à modifier
            $query->bindParam(':duration', $newModule['heures']);
            $query->bindParam(':color', $newModule['color']);

            if (isset($newModule['is_option'])) {
                $optionBool = 1;
            }else{
                $optionBool = 0;
            }

            $query->bindParam(':is_option', $optionBool);
            $query->execute();

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