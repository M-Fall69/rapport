<?php 
include("./inc/fonctions.php"); 
$ins_elec = chargerWsInscriptionElecteur();


///////////////// APPEL WEB SERVICES (connecterCompte) //////////////////////////

if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['pwd'])){
    $connecter = $ins_elec->call('connecterCompte',array(
    'login' => htmlspecialchars($_POST['login']),
    'password' => $_POST['pwd']
    )) ;

    if(!$connecter){
        $_SESSION['erreur']="Identifiant ou mot de passe incorrecte ! Merci de ressayer.";
    }else{
        $_SESSION['login'] = $_POST['login'] ;
        $_SESSION['success']="true";
        header('Location: index.php');
    }
}


?>