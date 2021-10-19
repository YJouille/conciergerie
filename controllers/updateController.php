<!-- Back controller -->
<?php
require_once(__DIR__.'/../models/InterventionModel.php');
    
$interventionModel = new InterventionModel();
$interventionModel->updateIntervention($_GET['update'], $_POST['date'], $_POST['etage'], $_POST['tache']);


// redirect to list (with error or message if set)
$url = "./index.php";
if(isset($GLOBALS['errorMessage'])) {
    $url .= "?error=" . $GLOBALS['errorMessage'];
}
if(isset($GLOBALS['infoMessage'])) {
    $url .= "?info=" . $GLOBALS['infoMessage'];
}
header('Location: ' . $url);
exit;