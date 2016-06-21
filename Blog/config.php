<?php 
	//require_once('functions.php');

	define('DB_USER','root');
	define('DB_NAME', 'ingrwf04_blog');
	define('DB_HOST', 'localhost');
	define('DB_PASSWORD', 'root');

	$db_connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	if($db_connect->errno):
			echo 'Echec de la connexion à la base de données : '.$db_connect->connect_error;
	else : 
			$db_connect->set_charset('utf8');
	endif;	

	session_start();
	//session_destroy();
 ?>