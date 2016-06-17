<?php 
	require('fonctions.php'); 
	require('config.php'); 
?>
<?php 
//-->Modification du poste
	if (isset($_POST["modifyQuestion"])) : 
		$sql=sprintf("UPDATE Questions SET title = '%s',question='%s' WHERE id_question = %s",
			$_POST['title'],
			$_POST['question'],
			$_POST['id_question']
		); //sprintf formatte tout ce qu'on reçoit de l'utilisateur en forme de texte. Le retour sera du string. %s est une variable locale de springf.
		$db_connect->query($sql);
		header('location:question.php?id_question='.$_GET['id_question']);
		exit;
	endif;
	$sql = "SELECT * FROM Questions WHERE id_question=".$_GET['id_question'];
	$question_request = $db_connect->query($sql);
	echo $db_connect->error; 
	while($question = $question_request->fetch_object()):
		$allRowsQuestions[] = $question;
	endwhile;
	myPrint_r($allRowsQuestions);
?>
<?php include('header.php') ;?>
	<form method="POST" id="form">
		<fieldset>
			<legend>Modifie ta question</legend>
			<label for="title">Titre :</label>
			<input type="text" name="title" id="title" value="<?php echo $allRowsQuestions[0]->title ?>"><br>
			<label for="question">Question :</label><br>
			<textarea name="question" id="question" cols="30" rows="10"  required><?php echo $allRowsQuestions[0]->question ?></textarea><br>
			<input type="hidden" name="modifyQuestion" value="yes">
			<input type="hidden" name="id_question" id="id_question" value="<?php echo $allRowsQuestions[0]->id_question ; ?>">
			<input type="submit" value="Modify Question">
			<a href="<?php echo 'index.php?id_question='.$_GET['id_question'] ?>">Cancel</a>
		</fieldset>
	</form>
<?php include('footer.php') ?>