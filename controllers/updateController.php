<!-- Back controller -->
<?php
require_once(__DIR__.'/../models/InterventionModel.php');
    
$interventionModel = new InterventionModel();
$interventionModel->updateIntervention($_GET['update'], $_POST['date'], $_POST['etage'], $_POST['tache']);


