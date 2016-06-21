<?php 
	include('models/articles.php');
	include('views/articles.php');

	$listArt = new Articles;
	$listArtView= new ArticlesViews;

	$array = $listArt->listing();
	$cat = $listArt -> listingCat();
	include('header.php');
	$listArtView ->listing($array, $cat);
	include('footer.php');
 ?>