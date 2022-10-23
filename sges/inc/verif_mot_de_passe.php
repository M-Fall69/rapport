<?php
 
require_once 'connexionbd.php';
if(!empty($_POST) && !empty($_POST['lastpwd']) && !empty($_POST['pwd'])){
    $req = $bdd->prepare('SELECT login, password FROM compte WHERE password=:pwd');
    $req->execute(['pwd' => $_POST['lastpwd']]);
    $pwd = $req->fetch();
    if(empty($_POST['pwd']) || $_POST['pwd'] != $_POST['cfpwd']){
        $err ="Les mots de passe ne correspondent pas !"."<br>";
    }
    else if($pwd != null){
        $reussi="Opération réussie votre mot de passe à été modifier avec succes";
        $users = $bdd->prepare('UPDATE compte SET password=:motDePasse 
            WHERE login=:login');
        $users->execute(array(
            'login' => $_SESSION['login'],
            'password' => htmlspecialchars($_POST['pwd'])
         )) OR die(print_r($bbd->errorInfo()));
 }
    else{    
        $err = "Mot de passe incorrect !"."<br>";
    }     
}
/*if(empty($errors)){

    // On enregistre les informations dans la base de données 
    $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?");
    // On ne sauvegardera pas le mot de passe en clair dans la base mais plutôt un hash
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    // On génère le token qui servira à la validation du compte 
    $token = str_random(60);
    $req->execute([$_POST['username'], $password, $_POST['email'], $token]);
    $user_id = $pdo->lastInsertId();
    // On envoit l'email de confirmation
    mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://local.dev/Lab/Comptes/confirm.php?id=$user_id&token=$token");
    // On redirige l'utilisateur vers la page de login avec un message flash
    $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte';
    header('Location: login.php');
    exit();

}
*/

?>