<?php

namespace src\Models;

use src\connection\DataBase;

class ClassModel{

    public static function getAllClasses(){
        try {
            $db = DataBase::connect();
            $query = $db->prepare(
                "SELECT 
                   c.id , c.id_grade , c.nom 
                FROM class as c;
            ");

            $query->execute();

            $result = $query->fetchAll();

            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
