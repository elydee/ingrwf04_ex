<?php 
	class AnswersView{
		function __construct(){}

		function listing($array){ ;?>
		 <?php if (count($array) > 0): ?>
		 	
		 
			<h1><?php echo $array[0] -> title ;?></h1>
			<p><?php echo $array[0] -> question ;?></p>	
				<ul>
				<?php for($i=0; $i < count($array); $i++):
					$myRow= $array[$i]; ?>
					<li>
						<p class="answer"><?php echo $myRow -> answer ;?></p>
				
						<p class="date"><?php echo dateAff($myRow -> dateA, "/") ;?></p>
					</li>
					<a href="?view=answer&delete=<?php echo $myRow->id_question ?>" class='delete'>delete</a>
				<?php endfor; ?>
				</ul>
		<?php endif ;?>
		<?php }
		function insert_form(){ ;?>
		<p>Answer this question</p>
			<form action="" method="post">
				<label for="answer">Answer</label>
				<input type="text" name="answer">
				<input type="hidden" name="id_question" id="id_question" value="<?php echo $_GET['id_question'];?>">
				<input type="submit" name='addAnswer' value="Send">
			</form>
		<?php }
	}
 ?>