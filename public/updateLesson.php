<?php

require "../vendor/autoload.php";

use src\Controllers\LessonController;

// récupère les données json de la reqête ajax
$input = json_decode(file_get_contents("php://input"), true);

if (
  isset($input["moduleId"]) &&
  isset($input["date"]) &&
  isset($input["time_start"]) &&
  isset($input["time_end"])
) {
  $moduleId = $input["moduleId"];
  $date = $input["date"];
  $timeStart = $input["time_start"];
  $timeEnd = $input["time_end"];

  $controller = new LessonController();
  $response = $controller->addLessonDate(
    $moduleId,
    $date,
    $timeStart,
    $timeEnd
  );

  echo json_encode($response);
} else {
  http_response_code(400);
}
