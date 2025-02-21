<?php

namespace src\Models;
use src\connection\DataBase;

class LessonModel{
    public static function saveLesson(){
        try {
            $db = DataBase::connect();
            $query = $db->prepare(
                "");

            $query->execute();

            $result = $query->fetchAll();

            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}