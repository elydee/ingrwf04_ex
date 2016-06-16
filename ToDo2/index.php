<?php 
	require('fonctions.php');
	require('classes.php'); 
	require('config.php'); 
?>
<?php 
if (isset($_GET['ID_category'])) :
	$sql = "SELECT * FROM Tasks LEFT JOIN Category ON Tasks.id_category=Category.ID_category WHERE Tasks.id_category =".$_GET["ID_category"];
else:
	$sql = "SELECT * FROM Tasks LEFT JOIN Category ON Tasks.id_category=Category.ID_category";
endif;
?>


<?php 
	$task_request = $db_connect->query($sql);
	echo $db_connect->error;
	// $allRows = $task_request->fetch_all(MYSQLI_ASSOC);
	

	while($row = $task_request->fetch_object()):
		$allRows[] = $row;
	endwhile;

	$sql = "SELECT * FROM Category";
	$category_request = $db_connect->query($sql);
	echo $db_connect->error;
	

	while($cat = $category_request->fetch_object()):
		$allRowsCats[] = $cat;
	endwhile;

	//myPrint_r($allRows, "print");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Tâches</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php for($i=0 ; $i<count($allRowsCats); $i++):?>
	<div class="cat">
		<h1><a href="?ID_category=<?php echo $allRowsCats[$i]->ID_category; ?>"><?php echo $allRowsCats[$i]->label; ?></a></h1>
	</div>
	<?php endfor; ?>

	<?php for($i=0 ; $i<count($allRows); $i++):?>
	<div class="task <?php echo $allRows[$i]->label; ?>">
		<a href="?ID_category=<?php echo $allRows[$i]->id_category; ?>" class="cat"><?php echo $allRows[$i]->label; ?></a>
		<h1><?php echo $allRows[$i]->title; ?></h1>
		<p><?php echo $allRows[$i]->description; ?></p>
	<?php if ($allRows[$i]-> date != '' AND $allRows[$i] -> date != "0000-00-00") :?>
		<p class="date"><?php echo dateAff($allRows[$i]->date, "/");?></p>
	<?php endif; ?>
	</div>
	<?php endfor; ?>
</body>
</html>