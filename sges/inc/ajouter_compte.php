<?php
require './inc/fonctions.php';

$ins_elec = chargerWsInscriptionElecteur();

if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['pwd'])){
    if(empty($_POST['pwd']) || $_POST['pwd'] != $_POST['cfpwd']){

        $_SESSION['errors'] ="Les mots de passe ne correspondent pas !"."<br>";

    }else {
    /////////////// APPEL WEB SERVICES (ajouterCompte) ////////////////////////
        $ajout_compte = $ins_elec->call('ajouterCompte',array(
        'login' => htmlspecialchars($_POST['login']),
        'password' => $_POST['pwd'],
        'num_cni' => $_SESSION['cni'] )
        ) ;

        if ($ajout_compte) {
            header('location:connexion.php');
            $_SESSION['reussi']="Félicitation vous possedez désormer un compte au SGES, veuillez renseigner votre login et votre mot de passe pour vous connecter";
            echo $_SESSION['reussi'];

        } else {
            $_SESSION['errors'] = "Ce login existe déja !"."<br>";
           
        }
        
        
    }
}
?>