<?php
// filepath: a:\programation\php\projetDoriane\updateLesson.php

require 'vendor/autoload.php';

use src\Controllers\LessonController;

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['moduleId']) && isset($input['date']) && isset($input['time_start']) && isset($input['time_end'])) {
  $moduleId = $input['moduleId'];
  $date = $input['date'];
  $timeStart = $input['time_start'];
  $timeEnd = $input['time_end'];

  $controller = new LessonController();
  $response = $controller->updateLessonDate($moduleId, $date, $timeStart, $timeEnd);

  echo json_encode($response);
} else {
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
