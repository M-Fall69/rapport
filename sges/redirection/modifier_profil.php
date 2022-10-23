<?php  
session_start();
require '../inc/connexionbd.php';


header('location:../profil.php#profil');
/*§§§§§§§§§§§§ ON COMMENCE PAR RECUPERER LES ANCIENS VALEURS §§§§§§§§§§§§*/
$req = $bdd->prepare('SELECT numeroCarte 
  FROM compte 
  WHERE compte.login=?
') ;
$req->execute(array($_SESSION['login']));

$compte = $req->fetch(); //ici compte est un tableau contenant tous les champs de compte.
//c'es la deuxieme fois que je me planque sur cette erreur de débutant.
$req = $bdd->prepare('SELECT nom,prenom,numeroCarte,filiere,niveau,mail,description,passion,DATE_FORMAT(`date_naissance`,\'%Y-%m-%d \') AS moment 
  FROM etudiant 
  WHERE etudiant.numeroCarte=?
') ;
$req->execute(array($compte['numeroCarte']));
$user = $req->fetch();
/************************************************************************************/

$users = $bdd->prepare('UPDATE etudiant SET nom=:nom,prenom=:prenom,numeroCarte=:numCarte,date_naissance=:date_naissance,filiere=:filiere,niveau=:niveau,mail=:mail,description=:description,passion=:passion
	WHERE numeroCarte=:numCarte');

if (isset($_POST['nom']) and !empty($_POST['nom'])) {
	$nom=htmlspecialchars($_POST['nom']);
}else{
	$nom=$user['nom'];
}
if (isset($_POST['prenom']) and !empty($_POST['prenom'])) {
	$prenom=htmlspecialchars($_POST['prenom']);
}else{
	$prenom=$user['prenom'];
}
if (isset($_POST['numCarte']) and !empty($_POST['numCarte'])) {
	$numeroCarte=htmlspecialchars($_POST['numCarte']);
}else{
	$numeroCarte=$user['numeroCarte'];
}
if (isset($_POST['date']) and !empty($_POST['date'])) {
	$date_naissance=htmlspecialchars($_POST['date']);
}else{
	$date_naissance=$user['moment'];
}
if (isset($_POST['filiere']) and !empty($_POST['filiere'])) {
	$filiere=htmlspecialchars($_POST['filiere']);
}else{
	$filiere=$user['filiere'];
}
if (isset($_POST['niveau']) and !empty($_POST['niveau'])) {
	$niveau=htmlspecialchars($_POST['niveau']);
}else{
	$niveau=$user['niveau'];
}
if (isset($_POST['mail']) and !empty($_POST['mail'])) {
	$mail=htmlspecialchars($_POST['mail']);
}else{
	$mail=$user['mail'];
}
if (isset($_POST['description']) and !empty($_POST['description'])) {
	$description=htmlspecialchars($_POST['description']);
}else{
	$description=$user['description'];
}
if (isset($_POST['passion']) and !empty($_POST['passion'])) {
	$passion=htmlspecialchars($_POST['passion']);
}else{
	$passion=$user['passion'];
}
$users->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'date_naissance' => $date_naissance,
	'filiere' => $filiere,
	'niveau' => $niveau,
	'mail' => $mail,
	'description' => $description,
	'passion' => $passion,
	'numCarte' => $numeroCarte
	)) OR die(print_r($bbd->errorInfo()));

    $_SESSION['numCarte'] = htmlspecialchars($_POST['numCarte']);

?>