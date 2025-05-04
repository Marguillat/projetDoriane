<?php

namespace src\Controllers;

use src\Models\CalendrierModel;
use DateTime;
use src\Models\LessonModel;
use src\Models\ModuleModel;
use src\Models\TeacherModel;

class CalendrierController extends RenderController
{
  public $dbSessions;
  public $dbModules;
  public $grades;
  public $classes;
  public $sessionYears;
  public $teachers;
  public $filters = [];

  public function __construct()
  {
    parent::__construct();
    
    // Handle delete lesson request
    if (!empty($_POST)) {
      if ($_POST["_method"] == "delete") {
        if (isset($_POST["lesson-id"])) {
          LessonModel::deleteLesson($_POST["lesson-id"]);
        }
      }
    }
    
    // Get filter data from GET request
    if (!empty($_GET)) {
      if (isset($_GET['type']) && $_GET['type'] === 'teacher' && !empty($_GET['teacher'])) {
        $this->filters['teacher'] = $_GET['teacher'];
      } else {
        // Class view filters
        if (!empty($_GET['grade'])) {
          $this->filters['grade'] = $_GET['grade'];
        }
        if (!empty($_GET['class'])) {
          $this->filters['class'] = $_GET['class'];
        }
        if (!empty($_GET['session'])) {
          $this->filters['session'] = $_GET['session'];
        }
      }
    }
    
    // Load data for filters
    $this->grades = CalendrierModel::getGrades();
    $this->classes = CalendrierModel::getClasses(isset($this->filters['grade']) ? $this->filters['grade'] : null);
    $this->sessionYears = CalendrierModel::getSessionYears();
    $this->teachers = TeacherModel::getTeachers();
    
    // Get filtered sessions
    $this->dbSessions = CalendrierModel::getSessions($this->filters);
    
    // Filter modules based on the same criteria
    if (!empty($this->filters)) {
      $this->dbModules = ModuleModel::getModulesAlocated($this->filters);
    } else {
      $this->dbModules = ModuleModel::getModulesAlocated();
    }

    $calendrierData = $this->creerCalendrierTableau(
      "2024-09-01",
      "2025-08-31",
      $this->dbSessions
    );
    $calendrierHtml = $this->buildCalendrierHtml($calendrierData);
    $modules = $this->dbModules;
    
    // Prepare view data
    $grades = $this->grades;
    $classes = $this->classes;
    $sessionYears = $this->sessionYears;
    $teachers = $this->teachers;
    $filters = $this->filters;

    require "src/Views/partials/header.phtml";
    require "src/Views/calendrier.phtml";
  }

  /**
   * Crée un calendrier du lundi au vendredi entre deux dates
   *
   * @param string $dateDebut Date de début au format 'YYYY-MM-DD'
   * @param string $dateFin Date de fin au format 'YYYY-MM-DD'
   * @param array $sessions Tableau des sessions à ajouter au calendrier
   * @return array Tableau des semaines avec les jours et sessions
   */
  private function creerCalendrierTableau(
    $dateDebut,
    $dateFin,
    $sessions
  ): array {
    // Convertir les chaînes en objets DateTime
    $debut = new DateTime($dateDebut);
    $fin = new DateTime($dateFin);

    // Tableau pour stocker les jours ouvrés organisés par semaine
    $semaines = [];

    // Parcourir chaque jour entre la date de début et de fin
    $jour = clone $debut; // deviens de la classe Date
    while ($jour <= $fin) {
      // Obtenir le numéro du jour de la semaine (1 = lundi, 5 = vendredi)
      $jourSemaine = (int) $jour->format("N");

      // Ne considérer que les jours de semaine (lundi à vendredi)
      if ($jourSemaine >= 1 && $jourSemaine <= 5) {
        $numSemaine = $jour->format("W");
        $annee = $jour->format("Y");
        $clesSemaine = "$annee-$numSemaine";

        if (!isset($semaines[$clesSemaine])) {
          $semaines[$clesSemaine] = [
            1 => null,
            2 => null,
            3 => null,
            4 => null,
            5 => null,
          ];
        }

        $semaines[$clesSemaine][$jourSemaine] = [
          "date" => $jour->format("Y-m-d"),
          "jour" => $jour->format("d-M"),
          "sessions" => [],
        ];

        foreach ($sessions as $key => $session) {
          if ($session["date"] == $jour->format("Y-m-d")) {
            array_push(
              $semaines[$clesSemaine][$jourSemaine]["sessions"],
              $session
            );
          }
        }
      }

      // Passer au jour suivant
      $jour->modify("+1 day");
    }

    return $semaines;
  }

  /**
   * Génère le HTML pour afficher le calendrier
   *
   * @param array $tableauSemaines Tableau des semaines avec les jours et sessions
   * @return string HTML généré pour le calendrier
   */
  private function buildCalendrierHtml($tableauSemaines): string
  {
    // Générer le tableau HTML
    $calendrierHtml =
      '<table class="w-full table-fixed border" border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse;">';
    $calendrierHtml .= $this->renderTableHeader();
    $calendrierHtml .= "<tbody>";

    foreach ($tableauSemaines as $semaine => $jours) {
      $calendrierHtml .= "<tr>";
      for ($i = 1; $i <= 5; $i++) {
        $calendrierHtml .= isset($jours[$i])
          ? $this->renderDayCell($jours[$i])
          : "<td></td>";
      }
      $calendrierHtml .= "</tr>";
    }

    $calendrierHtml .= "</tbody></table>";
    return $calendrierHtml;
  }

  /**
   * Génère l'en-tête du tableau du calendrier
   *
   * @return string HTML pour l'en-tête du tableau
   */
  private function renderTableHeader(): string
  {
    $joursNoms = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi"];
    $headerHtml = "<thead><tr>";
    foreach ($joursNoms as $nom) {
      $headerHtml .= '<th class="border">' . $nom . "</th>";
    }
    $headerHtml .= "</tr></thead>";
    return $headerHtml;
  }

  /**
   * Génère la cellule HTML pour un jour donné
   *
   * @param array $jour Les données du jour à afficher
   * @return string HTML pour la cellule du jour
   */
  private function renderDayCell($jour): string
  {
    $cellHtml = '<td class="border h-48" data-date="' . $jour["date"] . '">';
    $cellHtml .=
      '<div ondrop="dropAdd(event)" ondragover="allowDrop(event)" class="flex flex-col h-full gap-2">';
    $cellHtml .=
      '<span class="text-right underline">' . $jour["jour"] . "</span>";

    $cellHtml .= $this->renderSessionWrapper(
      $jour,
      "08:30:00",
      "12:30:00",
      "morning"
    );
    $cellHtml .= $this->renderSessionWrapper(
      $jour,
      "13:30:00",
      "16:30:00",
      "afternoon"
    );
    $cellHtml .= "</div></td>";
    return $cellHtml;
  }

  /**
   * Génère le wrapper HTML pour les sessions d'une période donnée
   *
   * @param array $jour Les données du jour
   * @param string $startTime L'heure de début de la période
   * @param string $endTime L'heure de fin de la période
   * @param string $period Période de la journée ('morning' ou 'afternoon')
   * @return string HTML pour le wrapper de sessions
   */
  private function renderSessionWrapper(
    $jour,
    $startTime,
    $endTime,
    $period
  ): string {
    $wrapperHtml =
      '<div data-date="' .
      $jour["date"] .
      '" data-timeStart="' .
      $startTime .
      '" data-timeEnd="' .
      $endTime .
      '" class="session-wrapper flex-1">';
    foreach ($jour["sessions"] as $session) {
      // Pour chaque session du jour (max 2 normalement) render le bloc du matin ou de l'apprem
      if (
        ($period === "morning" && $session["time_start"] > "12:00:00") ||
        ($period === "afternoon" && $session["time_start"] < "12:00:00")
      ) {
        continue;
      }
      $wrapperHtml .= $this->renderSessionBlock($session);
    }
    $wrapperHtml .= "</div>";
    return $wrapperHtml;
  }

  /**
   * Génère le bloc HTML pour une session donnée
   *
   * @param array $session Les données de la session à afficher
   * @return string HTML pour le bloc de session
   */
  private function renderSessionBlock($session): string
  {
    $blockHtml =
      '<div class="relative h-full flex flex-col justify-between w-full bg-[' .
      $session["color"] .
      '] flex-1 rounded-lg p-2">';
    $blockHtml .=
      '<span class="text-xs">' .
      $session["time_start"] .
      " - " .
      $session["time_end"] .
      "</span>";
    $blockHtml .= $this->renderDeleteForm($session["id"]);
    $blockHtml .=
      '<div class="text-sm font-semibold text-center">' .
      $session["nom"] .
      "</div>";
    $blockHtml .= "</div>";
    return $blockHtml;
  }

  /**
   * Génère le formulaire de suppression pour une session
   *
   * @param int $sessionId L'ID de la session à supprimer
   * @return string HTML pour le formulaire de suppression
   */
  private function renderDeleteForm($sessionId): string
  {
    $formHtml =
      '<form class="absolute top-0 right-0 bg-white w-7 h-7 rounded-[100%] flex justify-center items-center" method="post" action="' .
      $this->baseUrl .
      '">';
    $formHtml .=
      '<input name="_method" value="delete" type="hidden" readonly="readonly" />';
    $formHtml .=
      '<input name="lesson-id" value="' .
      $sessionId .
      '" type="hidden" readonly="readonly" />';
    $formHtml .= '<button><i class="fa-solid fa-xmark"></i></button>';
    $formHtml .= "</form>";
    return $formHtml;
  }
}
