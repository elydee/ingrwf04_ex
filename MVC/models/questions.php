<?php 
	class Questions{
			function __construct(){

			}
			function listing () {
				global $db_connect;
				$sql = "SELECT * FROM Questions ORDER BY date DESC";
				sqlAff($sql);
				$listQ = $db_connect ->query($sql);
				echo $db_connect->error;
				while($row = $listQ->fetch_object()):
					$allRows[] = $row;
				endwhile;
				//$allRows = $listQ->fetch_all(MYSQLI_ASSOC);
				return($allRows);

			}
			function listingQU () {
				global $db_connect;
				$sql = "SELECT * FROM questions_authors ORDER BY date DESC";
				sqlAff($sql);
				$listQ = $db_connect ->query($sql);
				echo $db_connect->error;
				$allRows = array();
				while($row = $listQ->fetch_object()):
					$allRows[] = $row;
				endwhile;
				//$allRows = $listQ->fetch_all(MYSQLI_ASSOC);
				return($allRows);
			}
			function insert ($post){
				global $db_connect;
				$sql = sprintf("INSERT INTO Questions SET title='%s', question='%s', date='%s', id_author='%s'",
					$_POST['title'],
					$_POST['question'],
					date ('Y-m-d'),
					6
					);
				$db_connect ->query($sql);
			}

			function delete($get){
				global $db_connect;
				$sql = sprintf("DELETE FROM Questions WHERE id_question='%s'",
					$get
					);
				sqlAff($sql);
				$listQ = $db_connect ->query($sql);
				echo $db_connect ->error;
			}
	} 
?>