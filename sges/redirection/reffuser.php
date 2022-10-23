<?php 
session_start();
require '../inc/connexionbd.php';
header('location:../invitations.php');

$damande = $bdd->prepare('DELETE FROM `invitation` 
	WHERE `invitation`.`numCarteInviteur` = ? AND `invitation`.`numCarteInvitee` = ?');
    $damande->execute(array(
	'numCarteInviteur' => $_GET['numCarteInviteur'],
	'numCarteInvitee' => $_GET['numCarteInvitee']
	)) OR die(print_r($bbd->errorInfo()));
?>