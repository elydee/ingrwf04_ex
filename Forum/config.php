<?php 

error_reporting(E_ALL);//demande d'afficher TOUTES les erreurs
ini_set('display_errors', TRUE);//demande d'afficher les erreurs
ini_set('display_startup_errors', TRUE);// demande d'afficher les erreurs de démarrages / ne fonctionne pas avec MAMP (php.init prend le dessus)
//connexion au serveur mySQL
define("DB_USER", "root");
define("DB_NAME", "ingrwf04_forum");
define("DB_HOST", "localhost");
define("DB_PASSWORD", "root");

$db_connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($db_connect->connect_errno) :
		echo "Fail to connect : ".$db_connect->connect_error;
		exit;
else :
		$db_connect->set_charset("utf8");
endif;
session_start();
?>