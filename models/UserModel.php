<?php
require_once('Database.php');
class UserModel extends Database
{
    public function login($login, $pwd)
    {

        // On écrit la requête
        $sql = 'SELECT * FROM user WHERE login_user = :login';
        $db = $this->connect();
        // On prépare la requête
        $query = $db->prepare($sql);
        // On injecte (terme scientifique) les valeurs
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        // On exécute la requête
        $user = $query->execute();
        //echo $query->debugDumpParams();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        //Première étape nous allons vérifier si l'utlisateur existe bel et bien
        if (!$user) {
            return 1; //utilisateur inconnu
        } else {
            //On utilise password_verify pour s'assurer que le mot de passe saisie est bien celui que nous avons en crypté dans la base de données
            if (password_verify($pwd, $user['pwd_user'])) {
                //Si c'est bon nous créons notre variable de session et faisons la redirection.
                return 0; //success
            } else {
                return 2; //mot de passe invalide
            }
        }
    }

    public function signin($login, $pwd)
    {   // Verifier que le login n'existe pas dans la base
        $sql = 'SELECT login_user FROM user WHERE login_user = "' . $login . '";';
        $db = $this->connect();
        $query = $db->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC to have the same keys as in the database
        // var_dump($result) ;
        // die;
        if (sizeof($result) != 0) {
            // Le login existe déjà
            $GLOBALS['errorMessage'] = 'login-exist';
            //////////////on doit rester sur la boite d'inscription
            $GLOBALS['action'] = 'signin'; //rester sur le formulaire
        } else {
            // On écrit la requête
            $sql = 'INSERT INTO user (login_user, pwd_user) VALUES (:login, :passwd)';
            // On prépare la requête
            $db = $this->connect();
            $query = $db->prepare($sql);
            // On injecte (terme scientifique) les valeurs
            $query->bindValue(':login', $login, PDO::PARAM_STR);
            $query->bindValue(':passwd', $pwd, PDO::PARAM_STR);
            // On exécute la requête
            $query->execute();
            return 0;
        }
    }
}
