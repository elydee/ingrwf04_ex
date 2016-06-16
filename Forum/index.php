<?php 
	require('fonctions.php'); 
	require('config.php'); 
?>
<?php 
//DELETE, UPDATE, INSERT viennent AVANT les SELECT
//-->Suppression de ses propres questions
	if (isset($_GET["delete"])) : 
		$sql= sprintf("UPDATE Questions SET online=0 WHERE id_question='%s'",
			$_GET['delete']);
		$db_connect->query($sql);
		echo $db_connect ->error;
			//suppression des réponses de cette question
		$sql= sprintf("UPDATE Answers SET online=0 WHERE id_question='%s'",
			$_GET['delete']);
		$db_connect->query($sql);
		echo $db_connect ->error;

		header('location:index.php');
		exit;
	endif;
//-->Ajouter une question avec le formulaire, insérer les données du formulaire dans la base de données
	if (isset($_POST["newQuestion"])) : 
		$sql=sprintf("INSERT INTO Questions SET title = '%s',question='%s', date='%s', id_author= %s", 
			$_POST['title'],
			$_POST['question'],
			date('Y-m-d'),
			$_SESSION['Users']['id_author']
		); //sprintf formatte tout ce qu'on reçoit de l'utilisateur en forme de texte. Le retour sera du string. %s est une variable locale de springf.
		$db_connect->query($sql);
		header('location:index.php');
		exit;
	endif;
//-->Récupération de la VIEW dans la base de données
	$sql = "SELECT * FROM questions_authors WHERE online=1";
	$question_request = $db_connect->query($sql);
	echo $db_connect->error; 
	while($question = $question_request->fetch_object()):
		$allRowsQuestions[] = $question;
	endwhile;
	//myPrint_r($allRowsQuestions, "print");
?>
<?php include("header.php") ?>
<?php if(isset($_SESSION['Users'])): // si l'utilisateur est connecté ==> afficher le formulaire?>
	<form method="POST" id="form">
		<fieldset>
			<legend>Posez une question</legend>
			<label for="title">Titre :</label>
			<input type="text" name="title" id="title" required><br>
			<label for="question">Question :</label><br>
			<textarea name="question" id="question" cols="30" rows="10" placeholder="ex: Quel est le nombre exacte de pi?" required></textarea><br>
			<input type="hidden" name="newQuestion" value="yes">
			<input type="submit" value="Add Question">
		</fieldset>
	</form>
<?php else: //si l'utilisateur n'est pas connecté ==> afficher le p?>
	<p class="alert">
		Veuillez vous connecter pour poser une question
	</p>
<?php endif; //fin de la condition?>
<h1>Les dernières questions</h1>
<?php for($i=0 ; $i<count($allRowsQuestions); $i++)://boucle pour récupérer chaque questions et chaque élément qui lui revient?>
	<?php $thisRow = $allRowsQuestions[$i]; //variable du tableau?>
	<div class="question">
		<h2>
			<a href="question.php?id_question=<?php echo $thisRow->id_question; ?>" class="question">
				<?php echo $thisRow->title; ?>
			</a>
		</h2>
		<p class="date">
			<?php echo dateAff($thisRow->date, "/");//utilisation de la fonction dateAff pour l'ordre d'affichage des jours/mois/années?>
		</p>
		<p>
			by <?php echo $thisRow->firstname." ".$thisRow->name;?>
		</p>
	</div>
	<?php if(isset($_SESSION['Users']['id_author']) AND $thisRow->id_author==$_SESSION['Users']['id_author']): ;//si l'id auteur existe dans la session on vérifie s'il est égal à l'objet sur lequel on est?>
		<a href="<?php url('delete='.$thisRow-> id_question); //fonction url pour récupérer l'url de la page?>" class="delete">Delete</a>
	<?php endif ?>
<?php endfor; ?>
<?php include('footer.php') ?>
