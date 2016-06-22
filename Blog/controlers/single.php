<?php 
		include('models/single.php');
		include('views/single.php');


	$listSingle = new Single;
	$listSingleView = new SingleView;

	$array = $listSingle -> article();
	$cat = $listSingle -> listingCat();

	include('header.php');
	$listSingleView -> article($array, $cat);
	include('footer.php');

?>