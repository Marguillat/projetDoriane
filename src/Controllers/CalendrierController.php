<?php

namespace src\Controllers;

use src\Models\calendrierModel;
use DateTime;
use src\Models\ModuleModel;

class CalendrierController extends RenderController{
    public $dbSessions;
    public $dbModules;

    public function __construct()
    {
        parent::__construct();

        $this->dbSessions = CalendrierModel::getSessions();
        $this->dbModules = ModuleModel::getModulesAlocated();
        
        $calendrierData = $this->creerCalendrierTableau('2024-09-01','2025-08-31',$this->dbSessions);
        $calendrierHtml = $this->buildCalendrierHtml($calendrierData);
        $modules = $this->dbModules;

        require('src/Views/partials/header.phtml');
        require('src/Views/calendrier.phtml');
    }

    /**
    * Crée un calendrier du lundi au vendredi entre deux dates
    * 
    * @param string $dateDebut Date de début au format 'YYYY-MM-DD'
    * @param string $dateFin Date de fin au format 'YYYY-MM-DD'
    */
    private function creerCalendrierTableau($dateDebut, $dateFin,$sessions) {
        // Convertir les chaînes en objets DateTime
        $debut = new DateTime($dateDebut);
        $fin = new DateTime($dateFin);
        
        // Tableau pour stocker les jours ouvrés organisés par semaine
        $semaines = [];
        
        // Parcourir chaque jour entre la date de début et de fin
        $jour = clone $debut; // deviens de la classe Date
        while ($jour <= $fin) {
            // Obtenir le numéro du jour de la semaine (1 = lundi, 5 = vendredi)
            $jourSemaine = (int)$jour->format('N');
            
            // Ne considérer que les jours de semaine (lundi à vendredi)
            if ($jourSemaine >= 1 && $jourSemaine <= 5) {
                $numSemaine = $jour->format('W');
                $annee = $jour->format('Y');
                $clesSemaine = "$annee-$numSemaine";
                
                if (!isset($semaines[$clesSemaine])) {
                    $semaines[$clesSemaine] = [
                        1 => null, 2 => null, 3 => null, 4 => null, 5 => null
                    ];
                }

                
                $semaines[$clesSemaine][$jourSemaine] = [
                    'date' => $jour->format('Y-m-d'),
                    'jour' => $jour->format('d-M'),
                    'sessions'=>[]
                ];

                foreach ($sessions as $key => $session) {
                    if($session['date'] == $jour->format('Y-m-d')){
                        array_push($semaines[$clesSemaine][$jourSemaine]['sessions'],$session);
                    }
                }
            }
            
            // Passer au jour suivant
            $jour->modify('+1 day');
        }
        
        return $semaines;
    }


    private function buildCalendrierHtml($tableauSemaines){
        // Générer le tableau HTML
        $calendrierHtml = '<table class="w-full table-fixed border" border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse;">';
        
        // En-têtes des jours de la semaine
        $calendrierHtml .= '<thead><tr>';
        $joursNoms = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];

        foreach ($joursNoms as $nom) {
            $calendrierHtml .= '<th class="border">' . $nom . '</th>';
        }

        $calendrierHtml .= '</tr></thead>';
        
        $calendrierHtml .= '<tbody>';
        foreach ($tableauSemaines as $semaine => $jours) {
            $calendrierHtml .= '<tr>';
            for ($i = 1; $i <= 5; $i++) {
                if (isset($jours[$i])) {
                    $sessionNames = "";

                    $sessionNames .= '<div data-date="' . $jours[$i]['date'] . '" data-timeStart="08:30:00" data-timeEnd="12:30:00" class="session-wrapper flex-1">';

                    if (!empty($jours[$i]['sessions'])) {

                        

                        $ctn = count($jours[$i]['sessions']);
                        for ($j=0; $j < $ctn; $j++) { 
                            $name = $jours[$i]['sessions'][$j]['nom'];
                            $color = $jours[$i]['sessions'][$j]['color'];
                            $heures = $jours[$i]['sessions'][$j]['time_start'].' - '.$jours[$i]['sessions'][$j]['time_end'];
                            $sessionNames .= '<div class="w-full bg-['.$color.'] flex-1 rounded-lg p-2">';
                            $sessionNames .= '<span class="text-xs">'.$heures.'</span>';
                            $sessionNames .= '<div class="text-sm font-semibold text-center">'.$name.'</div>';
                            $sessionNames .='</div>';
                        }
                    }

                    $sessionNames .= '</div>'; 

                    // Second time block (13:30:00 - 16:30:00)
                    $sessionNames .= '<div data-date="' . $jours[$i]['date'] . '" data-timeStart="13:30:00" data-timeEnd="16:30:00" class="session-wrapper flex-1">';
                    // Add logic for sessions in the second time block if needed
                    $sessionNames .= '</div>'; // Close the second wrapper div

                    $calendrierHtml .= '<td class="border h-48" data-date="' . $jours[$i]['date'] . '">'; //ouverture td
                    $calendrierHtml .= '<div ondrop="drop(event)" ondragover="allowDrop(event)" class="flex flex-col h-full gap-2"><span class="text-right">'.$jours[$i]['jour'].'</span>';
                    $calendrierHtml .= $sessionNames;
                    $calendrierHtml .= '</div>';
                    $calendrierHtml .= '</td>';//fermeture td
                } else {
                    $calendrierHtml .= '<td></td>';
                }
            }
            $calendrierHtml .= '</tr>';
        }
        $calendrierHtml .= '</tbody></table>';
        
        return $calendrierHtml;
    }

}