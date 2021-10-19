<?php
require_once('Database.php');
class UserModel extends Database
{
    public function login($login, $pwd){
    
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
    if(!$user){
        echo 'Désolé cet utilisateur n\'existe pas!';
    }else{
        //On utilise password_verify pour s'assurer que le mot de passe saisie est bien celui que nous avons en crypté dans la base de données
        if (password_verify( $pwd, $user['pwd_user'])) {
            //Si c'est bon nous créons notre variable de session et faisons la redirection.
            $_SESSION['connected']=true;
            header('location: ./index.php');
        
        } else {
            echo 'Le mot de passe est invalide.';
        }
    }
     ///////////////gerer les erreurs autrement         
    }

    
    public function signin($login,$pwd){
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
    
    }
}

