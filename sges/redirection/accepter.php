<?php 
require '../inc/connexionbd.php';
header('location:../invitations.php');

/*********************On crée la liaison d'amitié***********************************/
$amis = $bdd->prepare('INSERT INTO estamis(numCarteInviteur,numCarteInvitee,dateamitie) VALUES(:numCarteInviteur,:numCarteInvitee,NOW())');
$amis->execute(array(
	'numCarteInviteur' => $_GET['numCarteInviteur'],
	'numCarteInvitee' => $_GET['numCarteInvitee']
	)) OR die(print_r($bbd->errorInfo()));
/**********************************************************************************/

/*********************On supprime la liaison de demande***********************************/
$damande = $bdd->prepare('DELETE FROM `invitation` 
	WHERE `invitation`.`numCarteInviteur` = :numCarteInviteur AND `invitation`.`numCarteInvitee` = :numCarteInvitee ');
    $damande->execute(array(
	'numCarteInviteur' => $_GET['numCarteInviteur'],
	'numCarteInvitee' => $_GET['numCarteInvitee']
	)) OR die(print_r($bbd->errorInfo()));
/****************************************************************************************/

?>