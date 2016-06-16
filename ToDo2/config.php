<?php 

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//connexion oau serveur mySQL
define("DB_USER", "root");
define("DB_NAME", "ingrwf04_todo");
define("DB_HOST", "localhost");
define("DB_PASSWORD", "root");

$db_connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($db_connect->connect_errno) :
		echo "Fail to connect : ".$db_connect->connect_error;
		exit;
else :
		$db_connect->set_charset("utf8");
endif;
?>