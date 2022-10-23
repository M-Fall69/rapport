<?php 
require '../inc/connexionbd.php';
$cle = '../index.php#'.$_GET['codeContenus'];
header("location:$cle");

if (isset($_GET['codeContenus']) and !empty($_GET['codeContenus'])) {
	

if (isset($_POST['note']) and !empty($_POST['note'])) {

$insertnote=$bdd->prepare('INSERT INTO `notes` (`nombreEtoiles`) VALUES (:note) ');
$insertnote->execute(array('note' => $_POST['note']));

$codenote=$bdd->lastInsertId();

$attribuer=$bdd->prepare('INSERT INTO `attribuer` (`codeContenus`, `codenote`) VALUES (:codeContenus, :codenote) ');
$attribuer->execute(array('codeContenus' =>$_GET['codeContenus'] ,'codenote'=>$codenote));

}
}
?>
