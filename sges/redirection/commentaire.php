<?php  
session_start();
$cle = '../commentaires.php?numeroContenus='.$_POST['codeContenus'].'#'.$_POST['codeContenus'];
echo $cle;
header("location:$cle");
require '../inc/connexionbd.php';

$pub = $bdd->prepare('INSERT INTO `commentaire` (`commentateur`, `contenue`, `date`, `CodeContenus`) VALUES (:commentateur,:contenue ,now(),:CodeContenus)');
$pub->execute(array(
'commentateur' => $_SESSION['login'],
'contenue' => htmlspecialchars($_POST['contenue']),
'CodeContenus' => htmlspecialchars($_POST['codeContenus'])
)) OR die(print_r($bbd->errorInfo()));
?>