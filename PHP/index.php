<?php require("classes.php") ?>
<?php include("fonction.php");?>
<?php include("header.php");?>
<section>
	<?php 
	if(isset($_GET['page'])) :

		myPrint_r($_GET['page'], "vardump");		
	switch ($_GET['page']) :
	case "page1" : include("page01.php");
			break;
		case "page2" : include("page02.php");
			break;
		case "contact" : include("contact.php");
			break;
		case "cars" : include("cars.php");
			break;
		default: include("404.php");
			break;
	endswitch;
	else : include("accueil.php");
	endif;
?>
</section>
<?php include("footer.php");?>