<?php
$virhe = "FAIL";
$yhteysNro = mysql_connect("mysql.metropolia.fi","jennytr","Pokemon1");
$text = $_POST['newPwd'];
$md5tiiviste = hash('md5', $text);

if ($yhteysNro) {
	if (mysql_selectdb('jennytr')){
		$sql_lauseke = 'INSERT into ip_users(name, email, password) values(' .
		"\"{$_POST['fullName']}\", " .
		"\"{$_POST['newEmail']}\", " .
		"\"$md5tiiviste\");";
		mysql_query ($sql_lauseke) or $virhe = "Virhe: " . mysql_errno() . ": " . mysql_error(); 
	}
}


?>