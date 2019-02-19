<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>TP Ajax</title>
	</head>
	<header>
		<script>
			function initXMLHttpRequest() {
				var xhr = null;
				if (window.XMLHttpRequest) //Firefox & autres
					xhr = new XMLHttpRequest();
				else if (window.ActiveXObject) { //IE
					try {
						xhr = new ActiveXObject("Msxml2.XMLHTTP");
					} catch (e) {
						xhr = new ActiveObject("Microsoft.XMLHTTP");
					}
				
				} else { //XMLHttpRequest non supporté par le navigateur
					alert("Votre navigateur ne supporte pas les objets XMLHttpRequest...");
					xhr = false;
				}
			}
			
			function go() {
			//à faire
				
			}
		</script>
		
	</header>
	
<body>
	<?php 
		require('config.php');
	?>
	<form id="form_selects" action="" method="" onsubmit="return false;">
		 Auteurs : <select onchange="go();" id="liste1">
		 	<?php 
		    		$requete = "SELECT * FROM Auteur";

				//Execution de la requête sur le serveur
				if( !$resquery=mysqli_query($link, $requete) ){
					die("Error:".mysqli_errno($link).":".mysqli_error($link));
				} else {
	 
					while ($row = mysqli_fetch_array($resquery, MYSQLI_NUM)) {
					$_POST["auteur"];
			?>			
						<option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
					
					<?php
					}
				}
					?>
	  		
		</select></br></br>
		Livres : <select id="liste2"></select>
	</form>
</body>
</html>
