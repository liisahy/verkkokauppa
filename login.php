<?php 
session_start();
require_once('yhteiset/dbYhteys.php');
require_once('yhteiset/funktiot.php');
require_once('yhteiset/dbFunctions.php');

if(!empty($_POST['email'])&&!empty($_POST['pwd'])){
	if(check_user($_POST['email'], $_POST['pwd'], $DBH)){
		 $_SESSION['kirjautunut'] = 'juujuu';
	}else{
		echo '<script>alert("Login Failure");</script>';
		}
}

if($_GET['action'] == 'logout'){
	unset($_SESSION['kirjautunut']);
	session_destroy();
}
?>
