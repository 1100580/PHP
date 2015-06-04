<?php
$concelhos= array("Porto","Vila Nova de Gaia");   
$concelhosFreg= array( "Porto" => "Aldoar,Bonfim,Cedofeita,Foz do Douro,Lordelo do Ouro,Massarelos,Miragaia,Nevogilde,Paranhos,Ramalde",
                       "Vila Nova de Gaia" => "Arcozelo,Avintes,Canelas,Canidelo,Crestuma,Gulpilhares,Lever,Madalena,Mafamude,Olival,Oliveira do Douro,Pedroso,Perozinho");

function getFreguesias($concelho){
	global $concelhosFreg;
	$str = $concelhosFreg["$concelho"];
	$fregs = explode(",", $str);
	return $fregs;
}

function arraytoXML($array,$rootNode,$node){
	echo "<$rootNode>";
		for($i = 0; $i < sizeof($array); $i++){
			echo "<$node>"; 
				echo "$array[$i]"; 
			echo "</$node>";
		}
	echo "</$rootNode>";
}

header("Content-type:text/xml");
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';

	if(isset($_GET['concelho'])){
		$concelho=$_GET['concelho'];
	}
	else
        $concelho="Porto";

	arraytoXML(getFreguesias($concelho),"Freguesias","Freguesia");
?>