<?php require_once('config.php');
			require_once('functions.php');
			if(isset($_GET['view'])): 
		switch ($_GET['view']) :
		case('articles') : include('controlers/articles.php'); 
		break;
		case('post') : include('controlers/single.php'); 
		break;
		default : include('controlers/articles.php'); 
		break;
		endswitch;
	else: 
		include('controlers/articles.php');
	endif; 
?>