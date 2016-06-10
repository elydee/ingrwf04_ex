<?php require_once("config.php") ?>
<?php 

/* exemple de chaîne json à recevoir par POST['json']
{"title":"test","id_cat":"1","content":"l\'autre titre","date":null}
*/

$myJson = json_decode($_POST['myJson']);

//print_r($myJson);


	$sql = sprintf("INSERT INTO Tasks SET title = '%s', description = '%s', date = '%s', id_category = %s",
		addslashes($myJson->title),
		addslashes($myJson->description),
		addslashes($myJson->date),
		addslashes($myJson->id_category)
		);

	echo $sql; // affiche la requete pour controle
	
	$myListing = $connect->query($sql);
	echo $connect->error;
