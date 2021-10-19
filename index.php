<!-- Routeur qui indique quel controlleur appeler -->
<!-- ici le routeur est directement dans index.php, dans certains cas on l'appelle ici  -->
<?php
// session_start() crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie.
session_start();
//Nous allons vérifier si une variable de session connected existe auquel cas on va laisser l'utilisateur accéder à cette page
// $_SESSION['connected']=true;

if(isset($_GET['login'])){
    require_once(__DIR__.'/controllers/loginController.php');
}

if (isset($_GET['signin'])){
   
    require_once(__DIR__.'/controllers/signinController.php');
}


if (isset($_SESSION['connected'])) {
        //Gestion des erreurs et messages d'information
        $errors = [
            1 => "Veuillez remplir tous les champs du formulaire SVP.",
            2 => "Erreur avec la base de données, veuillez contacter le webmaster du site",
            3 => "Veuillez remplir tous les champs du formulaire de recherche SVP.",
            4 => ""
        ];
        $messages = [
            1 => "L'ajout de l'intervention s'est déroulé avec succès",
            2 => "La suppression de l'intervention s'est déroulée avec succès ",
            3 => "La modification de l'intervention s'est déroulée avec succès "
        ];
    
    
    if(isset($_GET['new'])){
        require_once(__DIR__.'/controllers/newController.php');
    }else if(isset($_GET['update'])){
        require_once(__DIR__.'/controllers/updateController.php');
    }else if(isset($_GET['delete'])){
        require_once(__DIR__.'/controllers/deleteController.php');
    }else if (isset($_GET['logout'])){
        require_once(__DIR__.'/controllers/logoutController.php');
    } else{
        require_once(__DIR__.'/controllers/listController.php');
    }
}
//Sinon nous allons le rediriger vers le formulaire de connexion
else{   
    require(__DIR__ . '/views/loginView.php');
}
?>