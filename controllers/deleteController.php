<!-- confirmation de suppression!! -->

<?php
/**
 * Delete intervention controller
 */
require_once(__DIR__ . '/../models/InterventionModel.php');

if (isset($_GET['delete'])) {
    $interventionModel = new InterventionModel();
    $interventionModel->deleteIntervention($_GET['delete']);
}

require_once('listController.php');
