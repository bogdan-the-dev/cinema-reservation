<?php
$dsn = "mysql:host = localhost;dbname=reservedb";
$username = "cinema";
$password = "thebestPASSWORD!";

try{
	$db = new PDO($dsn, $username, $password);
	echo "Connection Established!";
}catch(PDOException $e){
	$error_msg = $e->getMessage();
	exit();
}
?>