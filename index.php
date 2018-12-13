<!DOCTYPE html>
<html>
	<body style="background-color:hsl(0,0%,50%);">
		<center><b>Bienvenue sur le site web de gestion de votre equipe, pour vous connecter, veuillez saisir les informations de connexion.</b></center>
		<center><form action="index.php" method="post">
		 <p>Adresse e-mail : <input type="email" name="adresseM" /></p>
		 <p>Mot de passe : <input type="password" name="mdp" /></p>
		 <p><input type="submit" name="Envoyer"></p>
		</form></center>
	</body>
</html>


<?php
	 ///Données de connexion à la BD
	$server = "localhost";
	$login ="tts2330a";
	$mdp="DBBEhcD3";
	$db="tts2330a";
?>

<?php
	// On vérifie que les champs ne sont pas vides lors d'un clic sur le bouton Envoyer
	if (!empty($_POST['Envoyer'])) { // Si le bouton Envoyer est enfoncé
		if(empty($_POST['adresseM'])) { // Si le champ adresse e-mail est vide
			echo "Le champ Adresse e-mail est vide !";
		} else {
			if (empty($_POST['mdp'])) { // Si le champ MDP est vide
				echo "Le champ mot de passe est vide !";
			} else { // Sinon les champs sont remplis
				//Connexion à la BD
				$link = mysqli_connect($server, $login, $mdp, $db)
					or die("Error " . mysqli_error($link));
				// Verification de la connexion
				if (mysqli_connect_errno()) {
					print("Connect failed: \n" . mysqli_connect_error());
					exit();
				}

				// Récupération des valeurs du formulaire
				// htmlentities() pour éviter les injections SQL
				$adresseM = htmlentities($_POST['adresseM'], ENT_QUOTES, "ISO-8859-1");
				$mdp = htmlentities($_POST['mdp'], ENT_QUOTES, "ISO-8859-1");

				// Requête SELECT pour la vérification de l'utilisateur
				$requeteSQL = 'SELECT count(*) FROM entraineur WHERE Adresse_Mail="'.$adresseM.'" AND mdp="'.$mdp.'"';

				// Exécution de la requête dans la BD
				$reqExec = mysqli_query($link, $requeteSQL) or die('Erreur SQL !<br />'.$requeteSQL.'<br />'.mysqli_error($link));

				$data = mysqli_fetch_array($reqExec);
				mysqli_free_result($reqExec);
				mysqli_close($link);

				// Si on obtient une réponse, alors OK
				if ($data[0]==1) {
					header('Location: PAGENOM.php'); // À AJOUTER
					session_start();
					$_SESSION['adresseM']=$adresseM; // début de session
					exit();
				} elseif ($data[0]==0) {
					echo "Un des champs est incorrect...";
				} else {
					echo "Erreur dans la base de données.";
				}

			}
		}
	}
?>