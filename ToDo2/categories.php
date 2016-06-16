<?php 
	require('fonctions.php');
	require('config.php'); 
?>
<?php 
	$sql = "SELECT * FROM Category";
	$category_request = $db_connect->query($sql);
	echo $db_connect->error;
	

	while($cat = $category_request->fetch_object()):
		$allRowsCats[] = $cat;
	endwhile;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Categories</title>
</head>
<body>
	<?php for($i=0 ; $i<count($allRowsCats); $i++):?>
	<div class="categories">
		<ul><li><?php echo $allRowsCats[$i]->label; ?></li></ul>
	<?php endfor; ?>
</body>
</html>