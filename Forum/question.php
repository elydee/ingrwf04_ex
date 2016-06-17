<?php 
	require_once('fonctions.php');
	require_once('config.php'); 
?>
<?php //DELETE, UPDATE, INSERT viennent AVANT les SELECT
	if (isset($_GET["delete"])) : 
		$sql= sprintf("UPDATE Answers SET online=0 WHERE id_answer='%s'",$_GET['delete']);
		$db_connect->query($sql);
 		echo $db_connect ->error;
 		header('location:question.php?id_question='.$_GET['id_question']);
 		exit;
	endif;
//Modification de la réponse
	if(isset($_POST["modifyAnswer"])) :
	$sql=sprintf("UPDATE Answers SET answer = '%s' , id_question='%s' WHERE id_answer='%s'",
		$_POST['answer'],
		$_POST['id_question'],
		$_POST['id_answer']);
	$db_connect->query($sql);
	echo $db_connect -> error;
	header('location:question.php?id_question='.$_GET['id_question']);
	exit;
	endif;

//Ajout d'une réponse
	if (isset($_POST["newAnswer"])) : 
	$sql=sprintf("INSERT INTO Answers SET answer = '%s', id_author= %s, id_question=%s", 
		addslashes($_POST['answer']),
		$_SESSION['Users']['id_author'],
		$_POST['idQuestion']
	); //sprintf formatte tout ce qu'on reçoit de l'utilisateur en forme de texte. Le retour sera du string. %s est une variable locale de springf.

 $db_connect->query($sql);
 echo $db_connect ->error;
 header('location:question.php?id_question='.$_POST["idQuestion"]);
 exit;
	endif;
 ?>
<?php 
//trouver la question
$sql = "SELECT * FROM questions_authors WHERE id_question =".$_GET["id_question"];

	$question_request = $db_connect->query($sql);
	echo $db_connect->error;

	while($question = $question_request->fetch_object()):
		$allRowsQuestions[] = $question;
	endwhile;

//trouver les réponses
	$sql = "SELECT * FROM answers_authors WHERE online = 1 AND id_question =".$_GET["id_question"];

	$answer_request = $db_connect->query($sql);
	echo $db_connect->error;

	while($answer = $answer_request->fetch_object()):
		$allRowsAnswers[] = $answer;
	endwhile;
//trouver TOUTES les questions
	$sql = "SELECT * FROM Questions";

	$otherQuestions = $db_connect->query($sql);
	echo $db_connect->error;

	while($otherQ = $otherQuestions->fetch_object()):
		$otherRowsQuestions[] = $otherQ;
	endwhile;


	//myPrint_r($allRowsAnswers, "print");
?>

<?php include('header.php'); ?>
<section>
	<p><a href="index.php">BACK</a></p>
	<?php for($i=0 ; $i<count($allRowsQuestions); $i++):?>
		<?php $thisRow_Q =  $allRowsQuestions[$i]; ?>
		<div class="question">
		<p><?php echo $thisRow_Q->firstname." ".$thisRow_Q->name; ?> demande :</p>
		<h1><?php echo $thisRow_Q->title; ?></h1>
		<p><?php echo $thisRow_Q->question; ?></p>
		</div>
	<?php endfor; ?>
	<?php if($answer_request->num_rows > 0) : ?>
		<ul>
		<?php for($i=0 ; $i<count($allRowsAnswers); $i++):?>
			<?php $thisRow_A = $allRowsAnswers[$i] ;?>
			<li>
				<p><?php echo $thisRow_A->answer; ?></p>
				<p>answered by <?php echo $thisRow_A->firstname." ".$thisRow_A->name; ?></p>
			</li>
			<?php if(isset($_SESSION['Users']['id_author']) AND $thisRow_A->id_author==$_SESSION['Users']['id_author']): ;?>
				<a href="<?php url('delete='.$allRowsAnswers[$i]->id_answer); ?>" class="delete">Delete</a>
				<a href="<?php echo url("modify=".$allRowsAnswers[$i]->id_answer);?>" class="modify">Modify</a>
				<?php //modification réponse ?>
				<?php if(isset($_GET['modify'])AND $allRowsAnswers[$i]->id_answer==$_GET['modify']) : ?>
				<form method="POST" id="form" name="modifyAnswer">
					<fieldset>
					<legend>Modifie la réponse</legend>
					<label for="answer">Answer :</label><br>
					<textarea name="answer" id="answer" cols="30" rows="10" placeholder="ex: Quel est le nombre exacte de pi?" required><?php echo $allRowsAnswers[$i]->answer ?></textarea><br>
					<input type="hidden" name="id_answer" id="id_answer" value="<?php echo $allRowsAnswers[$i]->id_answer; ?>">
					<?php //selectionner une autre question mieux adaptée à la réponse ?>
					<select name="id_question" id="id_question" >
						<?php for($j=0; $j<count($otherRowsQuestions); $j++) :?>
							<?php //--->utilisation de l'opérateur ternaire. Ex: echo (2==2)? "vrai" : "faux"/ si 2=2 alors vrai, sinon faux (toujours besoin d'un "sinon (:)"?>
							<option value="<?php echo $otherRowsQuestions[$j]->id_question ;?>" <?php echo($thisRow_A->id_question==$otherRowsQuestions[$j]->id_question) ? 'selected' : ' ' ;?>><?php echo $otherRowsQuestions[$j]->title ?>
							</option>
						<?php endfor; ?>					
					</select>
					<input type="hidden" name="modifyAnswer" value="yes">
					<input type="submit" value="Modify Answer">
					<a href="<?php echo 'question.php?id_question='.$_GET['id_question'] ?>">Cancel</a>
					</fieldset>
				</form>
				<?php endif; ?>
			<?php endif ?>
		<?php endfor; ?>
		</ul>
	<?php else : ?>
	<p class="alert">Il n'y a pas encore eu de réponses :-(</p>
	<?php endif; ?>
<?php if(isset($_SESSION['Users'])): ;?>
<form method="POST" id="form" name="addAnswer">
	<fieldset>
	<legend>Répond à la question</legend>
		<label for="answer">Answer :</label><br>
		<textarea name="answer" id="answer" cols="30" rows="10" placeholder="ex: Quel est le nombre exacte de pi?" required></textarea><br>
		<!-- <input type="hidden" name="date" id="date" value="<?php //echo date('Y-m-d'); ?>"> Pas besoin si on fait appelle à la date du serveur dans les fonctions php-->
		<input type="hidden" name="idQuestion" id="idQuestion" value="<?php echo $_GET['id_question']; ?>"><br>
		<input type="hidden" name="newAnswer" value="yes">
		<input type="submit" value="Answer">
	</fieldset>
	</form>
<?php else: ?>
	<p class="alert">Veuillez vous connecter pour répondre à cette question</p>
<?php endif; ?>
</section>
<?php include('footer.php') ?>