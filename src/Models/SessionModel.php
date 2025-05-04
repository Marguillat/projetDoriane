<?php

namespace src\Models;

use src\connection\DataBase;

class SessionModel
{

  public static function getAllSessions(): array
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare(
        "SELECT 
           *
         FROM session"
      );

      $query->execute();

      $result = $query->fetchAll();

      return $result;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public static function addSession(array $sessionData): bool
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare(
        "INSERT INTO session (nom, date_debut, date_fin, id_class) 
         VALUES (:nom, :date_debut, :date_fin, :id_class);"
      );

      $result = $query->execute([
        ':nom' => $sessionData['nom'],
        ':date_debut' => $sessionData['date_debut'],
        ':date_fin' => $sessionData['date_fin'],
        ':id_class' => $sessionData['id_class']
      ]);

      return $result;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public static function deleteSession(int $sessionId): bool
  {
    try {
      $db = DataBase::connect();
      $query = $db->prepare("DELETE FROM session WHERE id = :id;");

      $result = $query->execute([':id' => $sessionId]);

      return $result;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
