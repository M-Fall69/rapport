<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
   <meta charset="utf-8">
   <title>SGES | Connexion</title>
   <link href="css/connexion.css" rel="stylesheet" type="text/CSS">   
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
  <?php include("petitheader.php") ?>
<div class="main">
  <div class="main_resize">
  <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Se connecter à SGES</h1>
            <?php if (isset($_SESSION['reussi'])) { ?> <p  class="alert alert-success" role="alert"> <?php 
              echo $_SESSION['reussi'];
             ?></p> <?php } ?>
             <?php require 'inc/connecterCompte.php'; ?>
            <?php if (isset($_SESSION['erreur'])) { ?><p  class="alert alert-warning" role="alert"> <?php echo $_SESSION['erreur']; ?></p> <?php } ?>
            <div class="account-wall">
                <img class="profile-img" src="assets/images/profilConnexion.png"
                    alt="le profile du user">
                <form action="connexion.php" method="post" class="form-signin">
                <input type="text" class="form-control" placeholder="Login" name="login" required autofocus>
                <input type="password" class="form-control" placeholder="Mot de passe" name="pwd" required>
                <button class="btn btn-lg btn-success btn-block" type="submit">
                    Se connecter</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Se souvenir de moi
                </label>
                <a href="#" class="pull-right need-help" style="color:green;"> Besoins d'aide?</a><span class="clearfix"></span>
                </form>
            </div>
            <a href="inscription.php" class="text-center new-account" style="font-size:2em"  style="color:green;">S'inscrire </a>
        </div>
    </div>
</div>
</div>
</div>
<br><br>
<div> <?php include("pied.php") ?></div>
</body>
</html>
