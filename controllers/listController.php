<?php
require_once(__DIR__ . '/../models/InterventionModel.php');
require_once(__DIR__ . '/../models/TacheModel.php');

// Construct condition SQL select query in order to build list of interventions
// $search is built with the fields of the search form

$search = "";
if (isset($_POST['dateSearch']) && $_POST['dateSearch'] != '') {
    $search .= "intervention.date_intervention = '" . $_POST['dateSearch'] . "';";
}
if (isset($_POST['etageSearch']) && $_POST['etageSearch'] != '') {
    if ($search != "") {
        $search .= " AND ";
    }
    $search .= "intervention.etage_intervention = " . $_POST['etageSearch'];
}
if (isset($_POST['tacheSearch']) && $_POST['tacheSearch'] != '') {
    if ($search != "") {
        $search .= " AND ";
    }
    $search .= "intervention.id_tache = " . $_POST['tacheSearch'];
}
    if ($search != "") {
        $search = " AND " . $search;
}

// Construct intervention list
$interventionModel = new InterventionModel();
$listInterventions = $interventionModel->listInterventions($search);

// Construct task list
$tacheModel = new TacheModel();
$listTaches = $tacheModel->listTaches();

require(__DIR__ . '/../views/listView.php');
exit;