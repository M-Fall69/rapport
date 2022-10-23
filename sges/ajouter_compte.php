<?php
session_start();
require 'inc/connexionbd.php';

if (!isset($_SESSION['cni'])) {
    header('location:inscription.php');
  } 
/* Pour information sur l'électeur sur l'electeur*/
$req = $bdd->prepare('SELECT * 
  FROM electeur 
  WHERE electeur.num_cni=?
') ;
$req->execute(array($_SESSION['cni']));
$user = $req->fetch();
/* --------------------- -----------------------*/

if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['pwd'])){
    $req = $bdd->prepare('SELECT login, password FROM compte WHERE login=:login');
    $req->execute(['login' => $_POST['login']]);
    $login = $req->fetch();
    if(empty($_POST['pwd']) || $_POST['pwd'] != $_POST['cfpwd']){
        $err ="Les mots de passe ne correspondent pas !"."<br>";
    }
    else if($login != null){
        $err = "Ce login existe déja !"."<br>";
    }
    else{

    chdir(getcwd());
    $photos = 'assets/avatars';
    $chemin = $photos.'/'.$_POST['login'] ;
    function IsDir_or_CreateIt($path) {
        if(is_dir($path)) {
          return true;
      } else {
        if(mkdir($path)) {
          return true;
        } else {
          return false;
        }
      }
    }

      if(IsDir_or_CreateIt($chemin)) {
        echo "Le dossier ".$chemin." est créé"."<br>";
    } else {
        echo "Une erreur est survenue lors de la création
            du dossier ".$chemin;
        }


    //$chemin=$chemin.$nom_du_fichier.'.jpg';
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
  chdir(getcwd());
    if (isset($_FILES['profil']['name']) AND $_FILES['profil']['error'] == 0)
      {
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['profil']['size'] <= 10000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['profil']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                    $destination = $chemin.'/'.'profil.jpg';
                   if (move_uploaded_file($_FILES['profil']['tmp_name'],$destination)){
                        echo "L'envoi a bien été effectué !";
                        }
                    else{
                        echo "Erreur lors du déplacement";
                    } 
                }
                else{
                    echo "Erreur d'extension";
                } 

        }else {
            echo "Erreur de taille fichier";
        }
}else {
    echo "Erreur fichier inexsitant";
    }

  }

}


?>
<!DOCTYPE html>
<html>
<head>
  <title>SGES | inscription Etape2</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/inscription.css" rel="stylesheet" type="text/css" />
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
  <div>
    <div>
      <?php include("petitheader.php") ?>
    </div>
    <div style="display: flex;">
    <div class="col-md-4 col-md-offset-4" id="login">
      <section id="inner-wrapper" class="login">
        <article>
          <p  class="alert alert-success" role="alert">
          Félicitations ! <span><?php echo $user['nom']; ?> <?php echo $user['prenom']; ?></span> Vous avez franchi la première étape!</p>
          <p>Veuillez renseigner un pseudo et un mot de passe pour compléter votre inscription.</p>
        </article>
      </section>
    </div>
    <div class="col-md-4 col-md-offset-4" id="login">
          <h2 class="text-center login-title">Finaliser l'inscription</h2>
            <?php require_once 'inc/ajouter_compte.php'; ?>
            <?php if (isset($err)) { ?><p  class="alert alert-warning" role="alert"> <?php echo $err; ?></p> <?php } ?>
            <section id="inner-wrapper" class="login">
              <article>
                <form method="post" action="ajouter_compte.php" enctype="multipart/form-data">
                 
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                      <input type="text" class="form-control" placeholder="Login*" required name="login">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"> </i></span>
                      <input type="password" class="form-control" placeholder="Mot de passe*" required name="pwd">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"> </i></span>
                      <input type="password" class="form-control" placeholder="Confirmer Mot de passe*" required name="cfpwd">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"> </i></span>
                      <input type="file" id="avatar" class="form-control" name="profil">
                    </div>
                  </div>
                    <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
                </form>
              </article>
            </section>
          </div>
          </div>
  </div>
  <br><br><br>
  <div> <?php include("pied.php") ?></div>
</body>
</html>