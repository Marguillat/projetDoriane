<?php

namespace src\Models;

use src\connection\DataBase;

class ClassModel
{

    public static function getAllClasses()
    {
        try {
            $db = DataBase::connect();
            $query = $db->prepare(
                "SELECT 
                   c.id , c.id_grade , c.nom 
                FROM class as c;"
            );

            $query->execute();

            $result = $query->fetchAll();

            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public static function addClass(array $classData): bool
    {
        try {
            $db = DataBase::connect();
            $query = $db->prepare(
                "INSERT INTO class (nom, id_grade) 
                 VALUES (:nom, :id_grade);"
            );

            $query->bindParam(':nom', $classData['nom']);
            $query->bindParam(':id_grade', $classData['id_grade']);

            $result = $query->execute();

            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * @param int $classId L'ID de la classe à supprimer
     * @return bool
     */
    public static function deleteClass(int $classId): bool
    {
        try {
            $db = DataBase::connect();
            $query = $db->prepare("DELETE FROM class WHERE id = :id;");

            $result = $query->execute([':id' => $classId]);

            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
