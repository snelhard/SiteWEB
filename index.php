Bienvenue sur le site web de gestion de votre equipe, pour vous connecter, veuillez saisir les informations de connexion.

	
<?php 
  //Démarrage de l'environnement de session
  session_start();

  //Ecriture dans une variable de session
	if (isset($_POST['adresseM']) && isset($_POST['mdp'])) {
		$_SESSION['adresseM'] = $_POST['adresseM'];
		$_SESSION['mdp'] = $_POST['mdp'];
	}
?>

<?PHP
	///Connexion au serveur MySQL
	$link = mysqli_connect("localhost", "root", "", "siteweb")
		or die("Error " . mysqli_error($link));

	///Verification de la connexion
	if (mysqli_connect_errno()) {
		print("Connect failed: \n" . mysqli_connect_error());
		exit();
	}
?>




<form action="index.php" method="post">
 <p>Adresse mail : <input type="email" name="adresseM" /></p>
 <p>mot de passe : <input type="password" name="mdp" /></p>
 <p><input name="stock" type="submit" value="Envoyer"></p>
</form>

<?php
	///Ecriture de la requête
	//$requete1 = "SELECT * FROM Personne WHERE nom like '%".$motscles."%'";
	if(isset($_SESSION['adresseM']) && isset($_SESSION['mdp'])) {
		$login = $_SESSION['adresseM'];
		$mdp = $_SESSION['mdp'];
	    //requete splittée par une boucle contenant des concaténations
	    $requete = "SELECT COUNT(*) FROM entraineur WHERE 'Adresse_mail' = $login AND 'mdp' = $mdp"; 
	    $nombre = mysqli_query($link, $requete); 
	    if ($nombre != 0 ) {
	    	echo "Compte trouvé";
	    } else { 
	    	echo "Compte inexistant";
	    }
	}
	
?>