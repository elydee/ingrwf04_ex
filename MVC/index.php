<?php require('config.php') ?>
<?php require('fonctions.php') ?>
<?php //routage 
	if(isset($_GET['view'])): 
		switch ($_GET['view']) :
		case('answer') : include('controllers/answers.php'); 
		break;
		case('questions') : include('controllers/main.php'); 
		break;
		default : include('controllers/main.php'); 
		break;
		endswitch;
	else: 
		include('controllers/main.php');
	endif; 
?>