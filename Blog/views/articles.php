<?php 
	class ArticlesViews{
		function __construct(){}

		function listing($array,$cat){?>
				
					<?php for ($i=0; $i < count($cat) ; $i++) : 
						$catRow = $cat[$i] ;?>
						<div id="col<?php echo $catRow->id_category ;?>"> 
							<h1>
								<a href="?view=category&id=<?php echo $catRow -> id_category ?>">
									<?php echo $catRow -> label ;?>
								</a>
							</h1>
							<?php for ($j=0; $j < count($array) ; $j++) :
									$art = $array[$j] ;?>
									<?php if ($catRow->id_category == $art -> id_categories) :?>
									<div class="article">
										<h1><?php echo $art->title ?></h1>
										<p class="date"><?php echo $art->date; ?></p>
										<p><?php echo $art ->content; ?></p>
										<a href="?view=post&id=<?php echo $art -> id_article ?>" class="plus">&gt;&gt;&gt;</a>
										<p class="signature"><?php echo $art ->firstname; ?></p>
									</div>
								<?php endif; ?>
							<?php endfor; ?>
						</section>
						</div>
				<?php endfor; ?>
				

	<?php }




	}

 ?>