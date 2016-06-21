<?php 
	include('models/answers.php');
	include('views/answers.php');

	$listA = new Answers;

	if (isset($_POST['addAnswer'])) :
		$back = $listA ->insert($_POST);
		header('location:index.php?view=answer&id_question='.$back);
		exit;
	endif;


	if (isset($_GET['delete'])) :
	//suppression de la réponse
	$listA -> delete_idQ($_GET['delete']);
	header("location:index.php");
	endif;

	$array = $listA -> listingQA($_GET['id_question']);

	$listAView= new AnswersView;


	include('header.php');
	$listAView ->listing($array);
	$listAView ->insert_form($_GET['id_question']);
	include('footer.php');
	// myPrint_r($array);
	// echo $_GET['id_question'];
 ?>