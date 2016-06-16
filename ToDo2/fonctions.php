<?php 
	function myPrint_r($variable, $action = 'print'){
	echo "<pre>";	
switch ($action) :
		case 'vardump':
		var_dump($variable);
		break;
	
		case 'print':
		print_r($variable);
		break;

		default:
		print_r($variable);
		break;
endswitch;
	echo "</pre>";
	}
	function dateAff($date, $separator){
		$date = explode('-', $date);
		$date = array_reverse($date);
		$date = implode ($separator, $date);
		return $date;
	}
?>
