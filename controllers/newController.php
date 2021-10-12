<!-- Back controller -->
<?php
/**
 * New intervention controller
 */
require_once(__DIR__.'/../models/InterventionModel.php');
require_once(__DIR__.'/../models/TacheModel.php');

// Create new task
if (isset($_POST['tache']) && $_POST['tache'] == "newTache") {  
    $tacheModel = new TacheModel();
    $tacheModel->newTache($_POST['newTache']);
    $_POST['tache'] = $_POST['newTache'];
}

// Create new intervention
$interventionModel = new InterventionModel();
$interventionModel->newIntervention($_POST['date'], $_POST['etage'], $_POST['tache']);

require_once('listController.php');