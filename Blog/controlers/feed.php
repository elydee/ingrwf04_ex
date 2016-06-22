<?php 
	include('models/articles.php');
	include('views/articles.php');
	if (isset($_GET['alt']) and $_GET['alt']=='json') :
		$listArt = new Articles;
		$listArtView = new ArticlesViews;
		$listArtView -> feedJson($listArt->listing());
	endif;
 ?>