<?php 
	class voiture{
		function __construct(){
				$this->wheels = 4;
		}
		function Infos($brand, $model, $color, $year){
			$this -> brand = $brand;
			$this -> model = $model;
			$this -> color = $color;
			$this -> year = $year;
		}
		function ChangeWheels($num){
			$this -> wheels = $num;
		}
		function Affiche(){
			echo "<div>";
			echo "<h1>".$this->brand."</h1>";
			echo "<h2>".$this->model."</h2>";
			echo "<ul>";
				echo "<li>".$this->color."</li>";
				echo "<li>".$this->year."</li>";
				echo "<li>".$this->wheels." wheels</li>";
			echo "</ul>";
			echo "</div>";
		}
	}//en class

 ?>