<?php 
	require('fonctions.php'); 
	require('config.php'); 
?>
<?php 

	if(isset($_GET['logout'])):
		unset($_SESSION['Users']);//UNSET enregistre des données comme la langue de l'utilisateur sans pour autant qu'il soit connecté. Un SESSION DESTROY détruit toutes les données.
		header('location:index.php');
		exit;
	endif;

	$sql = sprintf("SELECT * FROM Users WHERE email='%s' AND password='%s'",
		$_POST['email'],
		$_POST['password']);

	$myAuthor = $db_connect->query($sql);
	echo $db_connect->error;

	//boucle : lorsque que la variable "question" 
	while($row = $myAuthor->fetch_object()):
		$allRowsmyAuthor[] = $row;
	endwhile;
	//myPrint_r($allRowsQuestions, "print");
	//echo $myAuthor->num_rows;
	if($myAuthor->num_rows>0):
		$thisRow = $allRowsmyAuthor[0];
		$_SESSION['Users']['id_author']=$thisRow -> id_users;
		$_SESSION['Users']['email']=$thisRow -> email;
		header("location:index.php");
		exit;
	else: 
		header("location:index.php?error=log");
		exit;
	endif;
?>