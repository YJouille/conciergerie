<?php
/**
 * New intervention controller
 */
require_once(__DIR__.'/../models/InterventionModel.php');
require_once(__DIR__.'/../models/TacheModel.php');

// Create new task if necessary
$tacheId = "";
if (isset($_POST['tache']) && $_POST['tache'] == "newTache") {  
    $tacheModel = new TacheModel();
    $tacheId = $tacheModel->newTache($_POST['newTache']);
} else {
    $tacheId = $_POST['tache'];
}

// Create new intervention
$interventionModel = new InterventionModel();
$interventionModel->newIntervention($_POST['date'], $_POST['etage'], $tacheId);

