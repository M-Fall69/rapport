<?php  
    //$chemin=$chemin.$nom_du_fichier.'.jpg';
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
chdir(getcwd());
if (isset($_FILES['content']['name']) AND $_FILES['content']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['content']['size'] <= 10000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['content']['name']);
                $extension_fichier = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG', 'pdf', 'PDF');
                if (in_array($extension_fichier, $extensions_autorisees))
                {
                	$extensions_img = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG');
                	$extensions_doc = array('pdf', 'PDF');

                        // On peut valider le fichier et le stocker définitivement
                	if (in_array($extension_fichier, $extensions_img)) {
                		$_POST['type']='information';
                	}else if (in_array($extension_fichier, $extensions_doc)) {
                		$_POST['type']='document';
                	}else{
                		$_POST['type']='blog';
                	}
                    $_SESSION['destination'] = $chemin.'/'.'content.jpg';
                   if (move_uploaded_file($_FILES['content']['tmp_name'],$_SESSION['destination'])){
                        echo "L'envoi a bien été effectué !";
                        require '../inc/connexionbd.php';
						header('location:../index.php');
						$pub = $bdd->prepare('INSERT INTO `contenus` (`titre`, `description`, `text`, `date`, `type`, `login`) VALUES (:titre,:description,:texte,now(),:type,:login)');
						$pub->execute(array(
						'titre' => htmlspecialchars($_POST['titre']),
						'description' => htmlspecialchars($_POST['description']),
						'texte' => htmlspecialchars($_POST['text']),
						'type' => htmlspecialchars($_POST['type']),
						'login' => $_SESSION['login'] 
						)) OR die(print_r($bbd->errorInfo()));
	
						$_SESSION['codeContenu'] = $bdd->lastInsertId();
                        }
                    else{
                    	$_SESSION['err']="Erreur lors du déplacement";
                    } 
                }
                else{
                    $_SESSION['err']="Erreur d'extension";
                } 

        }else {
            $_SESSION['err']="Erreur de taille fichier";
        }
}else {
    $_SESSION['err']="Erreur fichier inexsitant";
}

?>