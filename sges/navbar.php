<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SGES | Nav Bar</title>
</head>
<body>
	<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.php">
              <img src="./assets/images/logo.jpg" id="logo" class="navbar-brand-img brand-sm">
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Tableau de Bord</span><span class="sr-only">(current)</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                <li class="nav-item active">
                  <a class="nav-link pl-3" href="./index.php"><span class="ml-1 item-text">Visiteur</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./espace_elec.php"><span class="ml-1 item-text">Electeur</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./espace_mod.php"><span class="ml-1 item-text">Moderateur</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./espace_centre.php"><span class="ml-1 item-text">Centre</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./espace_adm.php"><span class="ml-1 item-text">Administrateur</span></a>
                </li>
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Visiteur</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Voire Résultats</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./resultat_nat.php"><span class="ml-1 item-text">Nationnal</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./resultat_reg.php"><span class="ml-1 item-text">Régions</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./resultat_dep.php"><span class="ml-1 item-text">Départements</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./resultat_arr.php"><span class="ml-1 item-text">Arrondissements</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./resultat_com.php"><span class="ml-1 item-text">Communnes</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./resultat_cent.php"><span class="ml-1 item-text">Centres</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./resultat_bur.php"><span class="ml-1 item-text">Bureaux</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./resultat_cand.php"><span class="ml-1 item-text">Candidats</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="connexion.php">
                <i class="fe fe-layers fe-16"></i>
                <span class="ml-3 item-text">Connexion</span>
                <span class="badge badge-pill badge-primary">!</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-credit-card fe-16"></i>
                <span class="ml-3 item-text">Inscription</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./ajouter_electeur.php"><span class="ml-1 item-text">S'inscrire</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./verif_inscription.php"><span class="ml-1 item-text">Verifier son inscription</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./validation.php"><span class="ml-1 item-text">Envoyer Demande Validation</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-grid fe-16"></i>
                <span class="ml-3 item-text">Informations</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./infos.php"><span class="ml-1 item-text">Election actuelle</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./infos.php"><span class="ml-1 item-text">Elections anciennes</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-pie-chart fe-16"></i>
                <span class="ml-3 item-text">...</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">...</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">...</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">...</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">...</span></a>
                </li>
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Electeur</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="vote.php">
                <i class="fe fe-calendar fe-16"></i>
                <span class="ml-3 item-text">Voter</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-book fe-16"></i>
                <span class="ml-3 item-text">Requêtes</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                <a class="nav-link pl-3" href="./requete.php">Changement Bureaux<span class="ml-1"></span></a>
                <a class="nav-link pl-3" href="./requete.php"><span class="ml-1">Activation carte</span></a>
                <a class="nav-link pl-3" href="./requete.php"><span class="ml-1">...</span></a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Profile</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                <a class="nav-link pl-3" href="./profile.php"><span class="ml-1">Profile</span></a>
                <a class="nav-link pl-3" href="./profile_parametre.php"><span class="ml-1">Paramètres</span></a>
                <a class="nav-link pl-3" href="./profile_securite.php"><span class="ml-1">Sécurité</span></a>
                <a class="nav-link pl-3" href="./profile_notification.php"><span class="ml-1">Notifications</span></a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#fileman" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-folder fe-16"></i>
                <span class="ml-3 item-text">Contestations</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="fileman">
                <a class="nav-link pl-3" href="./contester.php"><span class="ml-1">Résultats</span></a>
                <a class="nav-link pl-3" href="./contester.php"><span class="ml-1">Informations</span></a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-compass fe-16"></i>
                <span class="ml-3 item-text">Aides </span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="support">
                <a class="nav-link pl-3" href="./support-center.php"><span class="ml-1">Générale</span></a>
                <a class="nav-link pl-3" href="./support-tickets.php"><span class="ml-1">Comment Voter</span></a>
                <a class="nav-link pl-3" href="./support-faqs.php"><span class="ml-1">FAQs</span></a>
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Modérateur</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-file fe-16"></i>
                <span class="ml-3 item-text">Electeur</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./valider_ins.php">
                    <span class="ml-1 item-text">Valider Inscription</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./list_contest.php">
                    <span class="ml-1 item-text">Contestations</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./liste_elec.php">
                    <span class="ml-1 item-text">Liste Electeur</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#auth" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-shield fe-16"></i>
                <span class="ml-3 item-text">Elections</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="auth">
                <a class="nav-link pl-3" href="./rapport_elec.php"><span class="ml-1">Rapport Election</span></a>
                <a class="nav-link pl-3" href="./rapport_result.php"><span class="ml-1">Publier Résultat</span></a>
                <a class="nav-link pl-3" href="./rapport_pub.php"><span class="ml-1">Modifier Publication</span></a>
                <a class="nav-link pl-3" href="./maj_resultat.php"><span class="ml-1">Mettre à jour Résultats</span></a>
                <a class="nav-link pl-3" href="./list_contest.php"><span class="ml-1">Contestations Résultats</span></a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#layouts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-layout fe-16"></i>
                <span class="ml-3 item-text">...</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="layouts">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">...</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">...</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">...</span></a>
                </li>
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Documentation</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="../docs/index.html">
                <i class="fe fe-help-circle fe-16"></i>
                <span class="ml-3 item-text">Getting Start</span>
              </a>
            </li>
          </ul>
          <div class="btn-box w-100 mt-4 mb-1">
            <a href="#" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-shopping-cart fe-12 mr-2"></i><span class="small">Devellopeurs</span>
            </a>
          </div>
        </nav>
    </aside>
</body>
</html>