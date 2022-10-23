<?php 


function chargerWsInscriptionElecteur(){
	require './lib/nusoap.php';
	$ins_elec = new nusoap_client("http://localhost/sges/ws_inscription_electeur.php?wsdl");
	return $ins_elec;
}


function chargerWsChangerBureau(){
	require '../lib/nusoap.php';
	$change_bureau = new nusoap_client("http://localhost/sges/ws_changer_bureau_de_vote.php?wsdl");
	return $change_bureau;
}

function chargerWsInscriptionElecteur2(){
	require '../lib/nusoap.php';
	$ins_elec = new nusoap_client("http://localhost/sges/ws_inscription_electeur.php?wsdl");
	return $ins_elec;
}


?>