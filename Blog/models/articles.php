<?php 
	class Articles{
		function __construct(){}

		function listing(){
			global $db_connect;
			$sql = "SELECT * FROM main WHERE online = 1";
			sqlAff($sql);
			$listArt = $db_connect->query($sql);
			echo $db_connect -> error;

			while($row = $listArt->fetch_object()):
				$allRows[] = $row;
			endwhile;

			return $allRows;
		}
		function listingCat(){
			global $db_connect;
			$sql = "SELECT * FROM Categories";
			sqlAff($sql);
			$listCat = $db_connect->query($sql);
			echo $db_connect->error;

			while ($row = $listCat->fetch_object()):
				$allRows[] = $row;
			endwhile;
			return $allRows;
		}
	}

 ?>