<?php 
$personne = array(
	"dickinson", "elisabeth", "25ans"
	);//tableau indexé (automatique)

$personne = array(
	"nom"=> "Dickinson",
	"prenom"=> "Elisabeth",
	"age"=> "25 ans"
	);//tableau associatif
echo $personne["nom"]." ".$personne["prenom"];

$personnel = array(
	array(
	"nom"=> "Dickinson",
	"prenom"=> "Elisabeth",
	"age"=> "25 ans"
	), array(
	"nom"=> "Palau",
	"prenom"=> "Maxime",
	"age"=> "23 ans"
	), array(
	"nom"=> "Olivier",
	"prenom"=> "Pauline",
	"age"=> "22 ans"
	));
echo $personnel[0]["age"];
echo "<ul>";
for($i = 0; $i<count($personnel); $i++):
	echo "<li>".$personnel[$i]["nom"]." ".$personnel[$i]["prenom"]."</li>";
endfor; // for uniquement pour tableau numériques (automatiques/indexés)
echo "</ul>";



echo "<ul>";
foreach($personnel as $value) :
	echo "<li>";
			foreach ($value as $key => $value) :
				echo "// ".$key." : ".$value."<br>";
			endforeach;
	echo "</li>";
endforeach; // foreach peut s'utiliser pour les numériques ou associatifs mais c'est conseillé de les utiliser uniquement pour les tableaux associatifs.
echo "</ul>";

?>