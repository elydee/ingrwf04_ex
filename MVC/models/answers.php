<?php 
	class Answers{
			function __construct(){

			}
			function listing($id_question) {
				global $db_connect;
				$sql = "SELECT * FROM Answers WHERE id_questionA=$id_questions ORDER BY dateA DESC";
				sqlAff($sql);
				$listA = $db_connect ->query($sql);
				echo $db_connect->error;
				$allRows=array();
				while($row = $listA->fetch_object()):
					$allRows[] = $row;
				endwhile;
				//$allRows = $listA->fetch_all(MYSQLI_ASSOC);
				return $allRows;

			}
			function listingQA ($id_question) {
				global $db_connect;
				$sql = "SELECT * FROM questions_answers WHERE id_questionA=$id_question ORDER BY dateA DESC";
				sqlAff($sql);
				$listA = $db_connect ->query($sql);
				echo $db_connect->error;
				$allRows=array();
				while($row = $listA->fetch_object()):
					$allRows[] = $row;
				endwhile;
				//$allRows = $listQ->fetch_all(MYSQLI_ASSOC);
				return $allRows;

			}
			function insert($post){
				global $db_connect;
				$sql = sprintf("INSERT INTO Answers SET answer='%s', id_author=%s, date='%s', id_question=%s",
				addslashes($post['answer']),
				1,
				date ('Y-m-d'),
				$post['id_question']
				);
				sqlAff($sql);
				$listQ = $db_connect ->query($sql);
				echo $db_connect->error;
				
				return $post['id_question'];
			}
			function delete_idQ($get){
				global $db_connect;
				$sql = sprintf("DELETE FROM Answers WHERE id_question='%s'",
					$get
					);
				sqlAff($sql);
				$listQ = $db_connect ->query($sql);
				echo $db_connect ->error;
			}
	} 
?>