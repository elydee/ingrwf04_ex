<?php 
	class QuestionsView{
		function __construct(){

		}
		function listing($array){ ?>
			<h1>Les Questions</h1>
			<?php if(count($array) > 0): ?>
			<ul>
				<?php for($i=0; $i < count($array); $i++):
					$myRow= $array[$i]; ?>
					<li>
						<h2><a href="?view=answer&id_question=<?php echo $myRow -> id_question ?>"><?php echo $myRow -> title; ?></a></h2>
						<p class="auteur"><?php echo $myRow -> email ;?></p>
						<p class="date"><?php echo dateAff($myRow -> date, "/") ;?></p>
					</li>
					<a href="?view=question&delete=<?php echo $myRow->id_question ?>" class='delete'>delete</a>
				<?php endfor; ?>
			</ul>
		<?php else: ?>
			<p>Nothing here</p>
		<?php endif ?>
		<?php }
		function insert_form(){ ;?>
		<p>Add a question</p>
			<form action="" method="post">
				<label for="title">Title</label>
				<input type="text" name="title">
				<label for="">Question</label>
				<input type="text" name="question">
				<input type="submit" name='addQuestion' value="Send">
			</form>
		<?php }
	}
 ?>