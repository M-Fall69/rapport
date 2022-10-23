<?php  
session_start();
header('location:../ajouter_compte.php');
require '../inc/fonctions.php';
$ins_elec = chargerWsInscriptionElecteur2();
////////////////// APPEL WEB SERVICES (ajouterElecteur) ////////////////////////////
$ajouter_electeur = $ins_elec->call('ajouterELecteur',array(
	'num_cni' => htmlspecialchars($_POST['cni']),
	'nom' => htmlspecialchars($_POST['nom']),
	'prenom' => htmlspecialchars($_POST['prenom']),
	'date_nais' => htmlspecialchars($_POST['date_nais']),
	'lieu_nais' => htmlspecialchars($_POST['lieu_nais']),
	'commune' => htmlspecialchars($_POST['commune']),
	'quartier' => htmlspecialchars($_POST['quartier']),
	'telephone' => htmlspecialchars($_POST['telephone']),
	'mail' => htmlspecialchars($_POST['mail'])
	));
//////////////// APPEL DU WEB SERVICES (changementAutomatiqueBureau) ////////////////////
$change_bureau = chargerWsChangerBureau();

$change_bureau = $change_bureau->call('changementAutomatiqueBureau',array(
	'num_cni' => htmlspecialchars($_POST['cni'])
	));

$_SESSION['cni'] = htmlspecialchars($_POST['cni']);
?>
