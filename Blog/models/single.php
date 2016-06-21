<?php 
	class Single{
		function __construct(){}

		function article(){
			global $db_connect;
			$sql = "SELECT * FROM main WHERE id_article=".$_GET['id'];
			sqlAff($sql);
			$listArt = $db_connect->query($sql);
			echo $db_connect -> error;

			while($row = $listArt->fetch_object()):
				$allRows[] = $row;
			endwhile;

			return $allRows;
		}

		function 
	}

 ?>