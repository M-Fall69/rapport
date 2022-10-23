<?php
class Compte{
	private $login =  null;
	private $password = null;
	private $cni = null;
	public $bdd = null; 
	//Le constructeur	
	public function  __construct(){
	}

        
	// les getteurs
    public function getLogin() { return $this->login;}
    public function getPassword() { return $this->password;}
    public function getCni() { return $this->cni;}

    //les setteurs
    public function setLogin($login) { $this->login = $login;}
    public function setPassword($password) { $this->password = $password;}
    public function setCni($cni) { $this->cni = $cni;}
    public function setBdd(){
    	try {
			$bdd = new PDO('mysql:host=localhost;dbname=sges;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e) {
			die('Erreur :'.$e->getMessage());
		}
		return $bdd;
    }

    public function getCompteByLogin($login){
    	$compte = new Compte();
    	$bdd = $compte->setBdd();
		$req = $bdd->prepare('SELECT * FROM compte WHERE login=:login');
    	$req->execute(['login' => $login]);
    	$result = $req->fetch();
		//$result = selectWithLogin($login);
    	$compte->setLogin($result['login']);
    	$compte->setPassword($result['password']);
    	$compte->setCni($result['num_cni']);
    	return $compte;
	}
}


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
   	public function setNom_bureau($mail) { $this->nom_bureau = $nom_bureau;}
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
    	return $electeur;
	}

}



class Ws{

	public $bdd = null;
	

/*	public function  __construct(){
		require_once "inc/connexionbd.php";
		//Recupération du nom de l'application
		$self = $_SERVER["PHP_SELF"];
		$add = explode("/", $self);
		//Adresse web de l'application
		$this->addresse = "http://".$_SERVER["HTTP_HOST"]."/".$add[1]."/";
	}*/

    public function getCompteByLogin($login){
    	$compte = new Compte();
    	return $compte->getCompteByLogin($login);
	}


    public function getElecteurByCni($num_cni){
    	$electeur = new Electeur();
    	return $electeur->getElecteurByCni($num_cni);
	}


	function connecterCompte($login, $password){
		$compte = new Compte();
		$compte = $compte->getCompteByLogin($login);
    	if($compte->getLogin() == null){
        	return false;
    	}else{
        	if(!password_verify($password, $compte->getPassword())){
        		return false;
        	}else{
        		return true;
        	}
	    }
	}


	function ajouterCompte($login, $password, $num_cni){
		$compte = new Compte();
		$compte = $compte->getCompteByLogin($login);
		if($compte->getLogin() == null){
  			$bdd = $compte->setBdd();
			$users = $bdd->prepare('INSERT INTO compte(login,password,num_cni) VALUES(:login,:password,:cni)');
	        $insert = $users->execute(array(
	            'login' => htmlspecialchars($login),
	            'password' => password_hash($password, PASSWORD_DEFAULT),
	            'cni' => $num_cni 
	         )) OR die(print_r($bbd->errorInfo()));
	        if($insert){
        		return true;
        	}else{
        		return false;
        	}
		}else{
			return false;
		}
    }



    function ajouterELecteur($num_cni,$nom,$prenom,$date_nais,$lieu_nais,$commune,$quartier,$telephone,$mail){
    	$electeur = new Electeur();
    	$test = $electeur->getElecteurByCni($num_cni);
		if($test->getNum_cni() == null){
			$bdd = $electeur->setBdd();
			$users = $bdd->prepare('INSERT INTO electeur(num_cni,nom,prenom,date_nais,lieu_nais,commune,quartier,telephone,mail) VALUES(:cni,:nom,:prenom,:date_nais,:lieu_nais,:commune,:quartier,:telephone,:mail)');
			$insert = $users->execute(array(
				'nom' => htmlspecialchars($nom),
				'prenom' => htmlspecialchars($prenom),
				'date_nais' => htmlspecialchars($date_nais),
				'lieu_nais' => htmlspecialchars($lieu_nais),
				'commune' => htmlspecialchars($commune),
				'quartier' => htmlspecialchars($quartier),
				'telephone' => htmlspecialchars($telephone),
				'mail' => htmlspecialchars($mail),
				'cni' => htmlspecialchars($num_cni)
				)) OR die(print_r($bbd->errorInfo()));
	        if($insert){
        		return true;
        	}else{
        		return false;
        	}
		}else{
			return false;
		}
    }



    function verifierDoubleInscription($login, $num_cni){
    	$electeur = new Electeur();
    	$electeur = $electeur->getElecteurByCni($num_cni);
		if($electeur->getNum_cni() != null){
			$compte = new Compte();
			$compte = $compte->getCompteByLogin($login);
    		if($compte->getLogin() != null){
    			return true;
    		}
    	}
    	return false;
	}



    function verifierInscription($login, $num_cni){
    	$e = new Electeur();
    	$e = $e->getElecteurByCni($num_cni);
		if($e->getNum_cni() != null){
			$compte = new Compte();
			$compte = $compte->getCompteByLogin($login);
    		if($compte->getLogin() != null){
				return $e->getCode_profile() ; //-> 0 ou 1 ou 2 ou 3 ou 4 ou 5		
    		}
    		return -1;
    	}
    	return -2;
	}

}

//ini_set('soap.wsdl_cache_enabled',0);
$serversoap = new SoapServer("http://localhost/sges/wsdl/inscription_electeur.wsdl");
$serversoap->setClass("Ws");
$serversoap->handle();

?>	