<?php

namespace src\Controllers;

use DateTime;
use src\Models\ClassModel;
use src\Models\ModuleModel;

class ModulesController extends RenderController{
    private $dbModules;
    private $dbClasses;

    public function __construct()
    {
        parent::__construct();

        $this->dbModules = ModuleModel::getModules();
        $this->dbClasses = ClassModel::getAllClasses();
        
        $modules = $this->dbModules;
        $classes = $this->dbClasses;

        require('src/Views/partials/header.phtml');
        require('src/Views/modules.phtml');

    }
}