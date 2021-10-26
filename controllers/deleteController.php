<!-- confirmation de suppression!! -->

<?php
/**
 * Delete intervention controller
 */
require_once(__DIR__ . '/../models/InterventionModel.php');

$interventionModel = new InterventionModel();
$interventionModel->deleteIntervention($_GET['delete']);


