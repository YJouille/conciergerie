<!-- confirmation de suppression!! -->

<?php
/**
 * Delete intervention controller
 */
require_once(__DIR__ . '/../models/InterventionModel.php');

$interventionModel = new InterventionModel();
$interventionModel->deleteIntervention($_GET['delete']);

//require_once('listController.php');
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
