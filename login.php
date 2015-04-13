<?php 
session_start();
require_once('yhteiset/dbYhteys.php');
require_once('yhteiset/funktiot.php');
require_once('yhteiset/dbFunctions.php');

// TODO: Sisäänkirjautuminen
//       Tee seuraava ehtolause: jos lomakkeen email ja pwd kentät eivät ole tyhjiä (eli lomake on lähetetty)
//       tarkasta sähkoposti ja salasana check_user-funktiolla (löytyy dbFunctions.php-tiedostosta)
//       jos email ja salasanä täsmäävät tehdään sessiomuuttuja:
//             $_SESSION['kirjautunut'] = 'juujuu';	
//       jos email ja salana ei täsmää tulosta javascriptillä ilmoitus: alert("Login Failure")		
if(!empty($_POST['email'])&&!empty($_POST['pwd'])){
	if(check_user($_POST['email'], $_POST['pwd'], $DBH)){
		 $_SESSION['kirjautunut'] = 'juujuu';
	} else {
		echo '<script>alert("Login Failure");</script>';
	}
}

// TODO: uloskirjautuminen. 
//       Tee seuraava ehtolause: jos 'action' parametri on 'logout' (tämä tulee osoitekentästä, kun käyttäjä klikkaa logout linkkiä. ks alempaa)
//       tuhoa sessio
//       käytä redirect-funktiota, ja ohjaa selain takaisin tälle sivulle, jotta sivu 'resetoituu'
// 	vaihtoehtoinen tapa:
//       Tee seuraava ehtolause: jos 'action' parametri on 'logout' (tämä tulee osoitekentästä, kun käyttäjä klikkaa logout linkkiä. ks alempaa)
//       tyhjennä sessiomuuttuja 'kirjautunut'

if($_GET['action'] == 'logout'){
	// session_destroy();
	// redirect($_SERVER['PHP_SELF']);
	// tai:
	unset($_SESSION['kirjautunut']);
	session_destroy();
}

?>
