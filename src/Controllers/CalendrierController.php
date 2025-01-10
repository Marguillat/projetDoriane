<?php

namespace src\Controllers;

use src\Models\calendrierModel;

class CalendrierController extends RenderController{

    public function __construct()
    {   
        parent::__construct();

        CalendrierModel::getSessions();
        // dégueulasse à changer
        require('src/Views/partials/header.phtml');
        require('src/Views/calendrier.phtml');
    }


}