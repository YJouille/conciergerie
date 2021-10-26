<?php
require_once(__DIR__ . '/../models/UserModel.php');

$userModel = new UserModel();

if (isset($_POST['login']) && isset($_POST['pwd'])) {
	$login = strip_tags($_POST['login']);
	$pwd = strip_tags($_POST['pwd']);
	$resultLogin = $userModel->login($login, $pwd);

	switch ($resultLogin) {
		case '0':
			$_SESSION['connected']=$login;
			$GLOBALS['infoMessage'] ='login-success';
			break;
		case '1':
			$GLOBALS['errorMessage']='login-not-found';
			break;
		case '2':
			$GLOBALS['errorMessage']='pwd-incorrect';
			break;
		default:
			//Ni connexion ni message d'erreur
			break;
	}
}
