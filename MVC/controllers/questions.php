<?php 
	include('models/questions.php');
	include('views/questions.php');

	$listQ = new Questions;
	$listQView = new QuestionsView;

	if (isset($_POST['addQuestion'])) :
		$listQ ->insert($_POST);
		header('location:index.php');
		exit;
	endif;


	if (isset($_GET['delete'])) :
		//suppression des réponses
		include("models/answers.php");
	$listA = new Answers;
	$listA -> delete_idQ($_GET['delete']);
	//suppression de la question
	$listQ -> delete($_GET['delete']);
	header("location:index.php");
	endif;


	$array = $listQ -> listingQU();
	include ('header.php');
	$listQView ->listing($array);
	$listQView -> insert_form();
	include('footer.php');
	//myPrint_r($listQ -> listing());
	//myPrint_r($listQ -> listingQA());
 ?>