<!-- Routeur qui indique quel controlleur appeler -->
<!-- ici le routeur est directement dans index.php, dans certains cas on l'appelle ici  -->
<?php
// session_start() crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie.
session_start();
//Nous allons vérifier si une variable de session connected existe auquel cas on va laisser l'utilisateur accéder à cette page
// $_SESSION['connected']=true;

//Gestion des erreurs et messages d'information
//changer les entier par clés
$errors = [
    1 => "Veuillez remplir tous les champs du formulaire SVP.",
    2 => "Erreur avec la base de données, veuillez contacter le webmaster du site",
    3 => "Veuillez remplir tous les champs du formulaire de recherche SVP.",
    'login-not-found' => "Impossible de se connecter, utilisateur inexistant",
    'pwd-incorrect' => "Impossible de se connecter, mot de passe incorrect",
    'login-exist' => "Ce login a déjà été utilisé, veuillez en choisir un autre"
  
];
$messages = [
    1 => "L'ajout de l'intervention s'est déroulé avec succès",
    2 => "La suppression de l'intervention s'est déroulée avec succès ",
    3 => "La modification de l'intervention s'est déroulée avec succès ",
    'signin-success' => "Inscription bien effectuée, veuillez vous connecter"
];

if (!isset($_SESSION['connected'])) {
    if (isset($_GET['login'])) {
        require_once(__DIR__ . '/controllers/loginController.php');
    } else {
        if (isset($_GET['signin'])) {
            require_once(__DIR__ . '/controllers/signinController.php');
        } else {
            include(__DIR__ . '/views/loginView.php');
            exit();
        }
    }
} else {
    // update messages
   $messages['login-success'] = 'Bonjour '. $_SESSION['connected'] . " !";
    if (isset($_GET['new'])) {
        require_once(__DIR__ . '/controllers/newController.php');
    } else if (isset($_GET['update'])) {
        require_once(__DIR__ . '/controllers/updateController.php');
    } else if (isset($_GET['delete'])) {
        require_once(__DIR__ . '/controllers/deleteController.php');
    } else if (isset($_GET['logout'])) {
        require_once(__DIR__ . '/controllers/logoutController.php');
    } else {
        require_once(__DIR__ . '/controllers/listController.php');
    }
}
// redirect to list (with error or message if set)
$url = "./index.php?";
if (isset($GLOBALS['action'])) {
    $url .= $GLOBALS['action'] . "&";
}
if (isset($GLOBALS['errorMessage'])) {
    $url .= "error=" . $GLOBALS['errorMessage'];
    header('Location: ' . $url);
    exit();
}
if (isset($GLOBALS['infoMessage'])) {
    $url .= "info=" . $GLOBALS['infoMessage'];
    header('Location: ' . $url);
    exit();
}
?>