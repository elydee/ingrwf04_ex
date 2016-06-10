<?php require_once("config.php") ?>
<?php 
//mon lama
	$sql = "SELECT * FROM Tasks LEFT JOIN Category ON Category.ID_category = Tasks.id_category ORDER BY Tasks.date ASC";
	$myListing = $connect->query($sql);
	echo $connect->error;
	$totalRows =  $myListing->num_rows;

	$allRows = array();
		while($row = $myListing->fetch_object()) :
			$allRows[] = $row;
		endwhile;
	header('Content-Type: application/json; charset=utf-8');
	echo $JsonList = json_encode($allRows);
 ?>