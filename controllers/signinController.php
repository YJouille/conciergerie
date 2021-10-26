<?php
require_once(__DIR__ . '/../models/UserModel.php');

$userModel = new UserModel(); /////////////////instancier le modèle que si besoin

if (isset($_POST['login']) && isset($_POST['pwd'])) {
	$login = strip_tags($_POST['login']);
	$pwd = strip_tags($_POST['pwd']);
	// 1. champ du form vides ?
	if (empty($_POST['login']) || empty($_POST['pwd'])) {
		$GLOBALS['errorMessage'] = 1;
		$GLOBALS['action'] = 'signin'; //rester sur le formulaire
	} else {
		// j'essai de m'inscrire

		//ICI on hash le password pour plus de sécurité
		$pwd = password_hash($pwd, PASSWORD_DEFAULT);
		$signinresult = $userModel->signin($login, $pwd);

		switch ($signinresult) {
			case 0:
				$GLOBALS['infoMessage'] ='signin-success';
				
				break;
			

			default:
				break;
		}
	}
} else {
	include(__DIR__ . '/../views/signinView.php');
}
