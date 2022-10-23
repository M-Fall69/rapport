<!DOCTYPE html>
<html>
<head>
  <title>SGES | inscription Etape1</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/inscription.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
          <p class="alert alert-secondary" role="alert">Bienvenue dans SGES inscrivez vous gratuitement:</p>
            <p class="alert alert-light" role="alert">Nous rendons la participation électorale aussi facile que l’entrée sur un site Web.<br></p>
            <p class="alert alert-secondary" role="alert">Nous sommes bien conscient des risques en matière de sécurité que cela présentent. <br></p>
            <p class="alert alert-light" role="alert">Le secret et l’anonymat du vote, l’impartialité, l’exactitude et la transparence sont notre sacerdoce.</p>
        </article>
      </section>
    </div>
 
    <div class="col-md-4 col-md-offset-4" id="login">
          <h1 class="text-center login-title">S'inscrire</h1>
            <section id="inner-wrapper" class="login">
              <article>
                <form method="post" action="redirection/ajouter_electeur.php">
                  <div class="ordonner">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                      <input type="text" class="form-control" placeholder="Nom*" required name="nom">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                      <input type="text" class="form-control" placeholder="Prenom*" required name="prenom">
                    </div>
                  </div>
                  </div>
                  <div class="ordonner">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                      <input type="date" class="form-control" placeholder="Date de naissance*" name="date_nais">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                      <input type="text" class="form-control" placeholder="Lieu de naissance*" required name="lieu_nais">
                    </div>
                  </div>
                  </div>
                  <div class="ordonner">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                      <input type="text" class="form-control" placeholder="Commune Résidence*" required name="commune">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                      <input type="text" class="form-control" placeholder="Quartier*" name="quartier" required>
                    </div>
                  </div>
                  </div>
                  <div class="ordonner">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"> </i></span>
                      <input type="text" class="form-control" placeholder="Telephone(Identifié)*" required name="telephone" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
                      <input type="email" class="form-control" placeholder="Email*" required name="mail">
                    </div>
                  </div>
                  </div>
                  <div class="ordonner">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"> </i></span>
                      <input type="int" class="form-control" placeholder="Numéro de CNI*" required name="cni">
                    </div>
                  </div>
                </div>
                    <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
                </form>
              </article>
            </section>
          </div>
      </div>
  </div>
  <br>
  <div> <?php include("pied.php") ?></div>
</body>
</html>