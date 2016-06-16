<!-- si je ne trouves pas classes.php, je bloque tout.
 -->
 <?php include_once("fonction.php"); ?>
 <?php 
 //session_destroy();
 if (isset($_POST['newCar'])):
 	include_once("classes.php");
 session_start();
 	$newCar = new Voiture;
 	$newCar->Infos($_POST['brand'],$_POST['model'],$_POST['color'],$_POST['year']);
 	$_SESSION["voiture"][]= $newCar;
 	header("location:cars.html");
 	exit;
 endif;
 myPrint_r($_SESSION,"print");
 echo $_SESSION["voiture"][0]->brand;
 
 foreach ($_SESSION['voiture'] as $result){
  $result->Affiche();
}
?>
<form action="cars.php" method="post">
	<label for="brand">BRAND :</label>
	<input type="text" name="brand" id="brand" required><br>
	<label for="model">MODEL :</label>
	<input type="text" name="model" id="model" required><br>
	<label for="color">COLOR :</label>
	<input type="text" name="color" id="color" required><br>
	<label for="year">YEAR :</label>
	<input type="text" name="year" id="year" required><br>
	<input type="submit" name ="newCar" value="Insert">
</form>