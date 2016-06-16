<?php
$jour="Monday";
$cours="PHP";
$name="pierre";

session_start();//la session par défaut est un array/on écrit rarement à la racine de la session -->
		if(isset($_GET['lg'])):
			$_SESSION['lg'] = $_GET['lg'];
			if($_GET['lg'] == 'reset'):
				session_destroy();
				header("location:page01.php");
				exit;
			else:
				$_SESSION['lg'] = $_GET['lg'];
			endif;
		endif;

?>
<!DOCTYPE html>
<html lang="<?php echo (isset($_SESSION['lg'])) ? $_SESSION['lg'] : "fr"; ?>">
<head>
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<meta charset="UTF-8">
	<title>first page for <?php echo "$cours"; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="description" content="description">
</head>
<body>
	<header>
		<img src="" alt="logo">
		<nav>
			<ul>
				<li><a href="?lg=fr">fr</a></li>
				<li><a href="?lg=en">en</a></li>
				<li><a href="?lg=nl">nl</a></li>
				<li><a href="?lg=reset">reset</a></li>
			</ul>
		</nav>

		<nav>
			<ul>
				<li><a href="index">Accueil</a></li>
				<li><a href="page1">Page 1</a></li>
				<li><a href="page2">Page 2</a></li>
				<li><a href="contact">Contact</a></li>
				<li><a href="cars">Cars</a></li>
			</ul>
		</nav>
	</header>
	init