<?php  
session_start();
require 'inc/droit_access_membre.php';
/*-----------------------------------------------------------------------------*/
require 'inc/connexionbd.php';
$req = $bdd->prepare('SELECT num_cni 
  FROM compte 
  WHERE compte.login=?
') ;
$req->execute(array($_SESSION['login']));

$compte = $req->fetch(); //ici compte est un tableau contenant tous les champs de compte.
//deuxieme fois que je me planque sur cette erreur de débutant.
$req = $bdd->prepare('SELECT * 
  FROM electeur 
  WHERE electeur.num_cni=?
') ;
$req->execute(array($compte['num_cni']));
$user = $req->fetch();

/*-----------------------------------------------------------------------------*/

/*******************************************************************/
/*     Donne l'âge à partir d'une date de naissance jj/mm/aaaa      */
/*******************************************************************/
function Age($date_naissance)
{
    $arr1 = explode('-', $date_naissance);
    $arr2 = explode('-', date('Y-m-d'));
        
    if(($arr1[1] < $arr2[1]) || (($arr1[1] == $arr2[1]) && ($arr1[2] <= $arr2[2])))
    return $arr2[0] - $arr1[0];

    return $arr2[0] - $arr1[0] - 1;
}


$date_de_naissance = $user['date_nais'];
$age = Age($date_de_naissance);
?>  
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>SGES | Profile</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>



    <link href="css/navbar.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/profil.css">
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
 <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- style responsive -->
  </head>
  <body class="vertical  light rtl ">
    <div class="wrapper">

      <!-- ###################  HEADER ################################### -->
                
                <?php include("header.php") ?>

      <!------------------------ Fin Header   ------------------------------------>

      <!-- ####################### BARRE NAVIGATION #############################-->
                     <!-- NAV BAR VERTICAL  -->
                <?php include("navbar.php") ?>

      <!--------------------------  fIN Barre navigation  ----------------------->

      <main role="main" class="main-content">
        
          <div class="content">
      <div class="content_bg">
        <div class="mainbar">
          <div class="article">
            <h2><span>Profil</span></h2>
            <div class="clr"></div>
            <div>
            <div class="container mt-5">
            <div class="row d-flex justify-content-center">
            <div class="col-md-12" style="background:url(../assets/images/main_bg.jpg) repeat-y center;">
            <div class="card p-3 py-4" style="background:url(../assets/images/main_bg.jpg) repeat-y center;">
                <div class="text-center"> <img src="<?php echo $_SESSION['chemin'] ; ?>" width="100" class="rounded-circle"> </div>
                <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $user['prenom'].' '; echo $user['nom']; ?></span>
                    <h5 class="mt-2 mb-0">Membre:   <?php echo $user['code_profile'] ?></h5> <span><?php echo $age; ?> ans</span>
                    <div class="px-4 mt-1">
                        <p class="fonts">Commune de résidence:  <?php if (empty($user['commune'])) {
                            echo "Non renseigné";
                        }else{echo $user['commune'];} ?> </p>                        <p class="fonts">Quartier:  <?php if (empty($user['quartier'])) {
                            echo "Non renseigné";
                        }else{echo $user['quartier'];} ?> </p>
                        <p class="fonts">Date de naissance:  <?php if (empty($user['date_nais'])) {
                            echo "Non renseigné";
                        }else{echo $user['date_nais'];} ?> </p> 
                        <p class="fonts">Lieu de résidence:  <?php if (empty($user['lieu_nais'])) {
                            echo "Non renseigné";
                        }else{echo $user['lieu_nais'];} ?> </p> 
                        <p class="fonts">Numero de CNI:  <?php if (empty($user['num_cni'])) {
                            echo "Non renseigné";
                        }else{echo $user['num_cni'];} ?> </p> 
                         <h4 class="mt-2 mb-0" style ="color:blue;">Centre:   <?php echo $user['nom_centre'] ?></h4>
                          <h4 class="mt-2 mb-0" style ="color:blue;">Bureau:   <?php echo $user['nom_bureau'] ?></h4> 
                    </div>
                    <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                    <div class="buttons"> <button class="btn btn-outline-primary   px-4">Modifier le profil</button> <button class="btn btn-primary px-4 ms-3">Mes publications</button> </div>
                </div>
            </div>
            </div>
        </div>
    </div>        
      
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>