<?php
require_once(__DIR__ . '/../models/UserModel.php');

$userModel = new UserModel();

if(isset($_POST['login']) && isset($_POST['pwd']) && (!empty($_POST['login'])) && (!empty($_POST['pwd']))){
	$login = strip_tags($_POST['login']);
	$pwd = strip_tags($_POST['pwd']);
    $userModel->login($login,$pwd);
}


