<?php 
		include('models/single.php');
		include('views/single.php');


	$listSingle = new Single;
	$listSingleView = new SingleView;

	$array = $listSingle -> listing();
	$cat = $listSingle -> listingCat();

	include('header.php');
	$listSingleView -> listing($array, $cat);
	include('footer.php');

?>