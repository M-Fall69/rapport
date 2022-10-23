<?php 
session_start();
require '../inc/connexionbd.php';
header('location:../listeUsers.php');
$send = $bdd->prepare('INSERT INTO invitation(dateInv,numCarteInviteur,numCarteInvitee) VALUES(now(),:numCarteInviteur,:numCarteInvitee)');
$send->execute(array(
	'numCarteInviteur' => $_GET['numCarteInviteur'],
	'numCarteInvitee' => $_GET['numCarteInvitee']
	)) OR die(print_r($bbd->errorInfo()));


?>