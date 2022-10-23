  <?php 

class Electeur{
	private $num_cni =  null;
	private $nom = null;
	private $prenom = null;
	private $date_nais =  null;
	private $lieu_nais = null;
	private $commune = null;
	private $quartier =  null;
	private $telephone = null;
	private $mail = null;
	private $code_profile = null;
	private $nom_bureau = "Neant";
	private $nom_centre = "Neant";
	public $bdd = null;

	// les getteurs
    public function getNum_cni() { return $this->num_cni;}
    public function getNom() { return $this->nom;}
    public function getPrenom() { return $this->prenom;}
    public function getDate_nais() { return $this->date_nais;}
    public function getLieu_nais() { return $this->lieu_nais;}
    public function getCommune() { return $this->commune;}
    public function getQuartier() { return $this->quartier;}
    public function getTelephone() { return $this->telephone;}
    public function getMail() { return $this->mail;}
    public function getCode_profile() { return $this->code_profile;}
    public function getNom_bureau() { return $this->nom_bureau;}
    public function getNom_centre() { return $this->nom_centre;}

    //les setteurs
    public function setNum_cni($num_cni) { $this->num_cni = $num_cni;}
    public function setNom($nom) { $this->nom = $nom;}
    public function setPrenom($prenom) { $this->prenom = $prenom;}
    public function setDate_nais($date_nais) { $this->date_nais = $date_nais;}
    public function setLieu_nais($lieu_nais) { $this->lieu_nais = $lieu_nais;}
    public function setCommune($commune) { $this->commune = $commune;}
    public function setQuartier($quartier) { $this->quartier = $quartier;}
    public function setTelephone($telephone) { $this->telephone = $telephone;}
   	public function setMail($mail) { $this->mail = $mail;}
   	public function setCode_profile($code_profile) { $this->code_profile = $code_profile;}
   	public function setNom_bureau($nom_bureau) { $this->nom_bureau = $nom_bureau;}
   	public function setNom_centre($nom_centre) { $this->nom_centre = $nom_centre;}
   	

    public function setBdd(){
    	try {
			$bdd = new PDO('mysql:host=localhost;dbname=sges;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e) {
			die('Erreur :'.$e->getMessage());
		}
		return $bdd;
    }


    public function getElecteurByCni($num_cni){
		$electeur = new Electeur();
		$bdd = $electeur->setBdd();
		$req = $bdd->prepare('SELECT * FROM Electeur WHERE num_cni=:num_cni');
    	$req->execute(['num_cni' => $num_cni]);
    	$result = $req->fetch();

    	$electeur->setNum_cni($result['num_cni']);
    	$electeur->setNom($result['nom']);
    	$electeur->setPrenom($result['prenom']);
    	$electeur->setDate_nais($result['date_nais']);
    	$electeur->setLieu_nais($result['lieu_nais']);
    	$electeur->setCommune($result['commune']);
    	$electeur->setQuartier($result['quartier']);
    	$electeur->setTelephone($result['telephone']);
    	$electeur->setMail($result['mail']);
    	$electeur->setNom_bureau($result['nom_bureau']);
    	$electeur->setNom_centre($result['nom_centre']);
    	return $electeur;
	}


	public function getNombreElecteurParBureau($nom_bureau,$nom_centre){
		$electeur = new Electeur();
		$bdd = $electeur->setBdd();
	    $req = $bdd->prepare('SELECT COUNT(num_cni) AS nbr_electeur FROM electeur WHERE nom_bureau = :nom_bureau AND nom_centre = :nom_centre ');
		$req->execute(array('nom_bureau' => $nom_bureau,
			'nom_centre' => $nom_centre)) OR die(print_r($bbd->errorInfo()));
		$result = $req->fetch();

		return $result['nbr_electeur'] ;
	}

}



class Ws{



   	public function changementAutomatiqueBureau($num_cni) { 
   		$e = new Electeur();
		$bdd = $e->setBdd();
		$e = $e->getElecteurByCni($num_cni);
		/* On vérifie d'abord si la commune renseignée par l'élécteur se trouve dans notre base (Table commune) */
		$req = $bdd->prepare('SELECT nom_com FROM commune WHERE nom_com = :commune ');
    	$req->execute(array('commune' => $e->getCommune()));
    	$commune = $req->fetch(); 

    	if ($commune['nom_com'] != null) { //Si c'est le cas
    	/* On vérifie ensuite dans la table centre s'il y a un centre qui commence par le quartier de l'électeur (les données sont remplies ainsi dans la base)*/
			$req = $bdd->prepare('SELECT nom_centre FROM centre WHERE nom_centre like ? ');
    		$req->execute([$e->getQuartier().'%']);
    		$centre = $req->fetch(); 
    		if ($centre['nom_centre'] != null) {	//si c'est le cas :
    			$i = 1;
    			while($i <= 50)	{ // 50 : nombre de bureaux maxi pour un centre
    				/*  On compte le nombre d'élécteur dans chaque bureau de vote dans l'ordre croissant à partir du centre en question*/

    				$nbr_electeur = $e->getNombreElecteurParBureau('bureau_'.$i,$centre['nom_centre']);

		    		/*  Des que l'on chope le premier bureau du centre concerné avec un nombre d'élécteur inférieur à 100 On affecte là bas notre élécteur */
		    		if ($nbr_electeur <= 100) {
		    			$req = $bdd->prepare('UPDATE `electeur` SET `nom_bureau` = :nom_bureau, `nom_centre` = :nom_centre WHERE `num_cni` = :num_cni');
						$maj = $req->execute(array('nom_bureau' => 'bureau_'.$i,
		    								'nom_centre' => $centre['nom_centre'],
		    								'num_cni' => $e->getNum_cni())) OR die(print_r($bbd->errorInfo()));
						$nbr_electeur = $e->getNombreElecteurParBureau('bureau_'.$i,$centre['nom_centre']) ;
    				/*  On actualise Enfin le nombre d'inscrit dans ce bureau */
			    		$req = $bdd->prepare('UPDATE `bureau` SET `nombre_inscrits` = :nbr_electeur WHERE `nom_bureau` = :nom_bureau AND `nom_centre` = :nom_centre');
			    		$req->execute(array('nom_bureau' => 'bureau_'.$i,
			    			'nom_centre' => $centre['nom_centre'],
			    			 'nbr_electeur' => $nbr_electeur)) OR die(print_r($bbd->errorInfo()));
		    			return 0;		

		    		}else $i = $i+1; //On incrémente de 1 pour passé au bureau suivant
	    		}
	    		
    		} return 1;

    	} return 2;

}


	public function changementManuelBureau($num_cni,$nom_bureau,$nom_centre){
		$e = new Electeur();
		$bdd = $e->setBdd();
		$e = $e->getElecteurByCni($num_cni);
		$req = $bdd->prepare('UPDATE `electeur` SET `nom_bureau` = :nom_bureau, `nom_centre` = :nom_centre WHERE `num_cni` = :num_cni ');
		$maj = $req->execute(array('nom_bureau' => $nom_bureau,
							'nom_centre' => $nom_centre,
							'num_cni' => $num_cni
						)) ;
		if ($maj) {
			/* On compte le nombre d'électeur dans l'ancien bureau */

    		$nbr_electeur = $e->getNombreElecteurParBureau($e->getNom_bureau() ,$e->getNom_centre());

			/*  On actualise le nombre d'élécteur inscrit dans l'ancien bureau */
			$req = $bdd->prepare('UPDATE `bureau` SET `nombre_inscrits` = :nbr_electeur WHERE `nom_bureau` = :nom_bureau AND `nom_centre` = :nom_centre');
			$req->execute(array('nom_bureau' => $e->getNom_bureau(),
				'nom_centre' => $e->getNom_centre(),
				 'nbr_electeur' => $nbr_electeur)) OR die(print_r($bbd->errorInfo()));

			/* On compte le nombre d'électeur dans l'ancien bureau */
 			$nbr_electeur = $e->getNombreElecteurParBureau($nom_bureau ,$nom_centre);

			/*  On actualise enfin le nombre d'élécteur inscrit dans le nouveau bureau */
			$req = $bdd->prepare('UPDATE `bureau` SET `nombre_inscrits` = :nbr_electeur WHERE `nom_bureau` = :nom_bureau AND `nom_centre` = :nom_centre');
			$req->execute(array('nom_bureau' => $nom_bureau,
				'nom_centre' => $nom_centre,
				 'nbr_electeur' => $nbr_electeur)) OR die(print_r($bbd->errorInfo()));
			return true;
		}
		return false;

	}

	public function demanderChangementBureau($num_cni,$nom_bureau,$nom_centre){
		$e = new Electeur();
		$bdd = $e->setBdd();
		$e = $e->getElecteurByCni($num_cni);

		$dest="mail.moustapha.fall@gmail.com";
		$objet="Demande Changement de bureau de vote";
		$message="
		  <font face='arial'>
		  Numéro de Cni: <b> $num_cni</b>
		  Prenom : $e->getPrenom()
		  Nom : $e->getNom()
		  Commune : $e->getCommune()
		  Quartier : $e->getQuartier()
		  Date et lieu de naissance	: $e->getDate_nais() à $e->getLieu_nais()
		  Bureau de vote actuel : <b> $e->getNom_bureau() </b>
		  Centre de vote actuel : <b> $e->getNom_centre() </b>
		  -----------------------------------------------------------------
		  Bureau de vote demandé : <b> $nom_bureau </b>
		  Centre de vote demandé : <b> $nom_centre </b>
		  </font>
		";
		$entetes="From: $e->getMail()";
		$entetes.="Cc: moderateursSGES@gmail.comn";
		$entetes.="Content-Type: text/html; charset=iso-8859-1";

		if(mail($dest,$objet,$message,$entetes))
		  return true;
		else
		  return false;

	}


}


//ini_set('soap.wsdl_cache_enabled',0);
$serversoap = new SoapServer("http://localhost/sges/wsdl/changer_bureau_de_vote.wsdl");
$serversoap->setClass("Ws");
$serversoap->handle();





?>