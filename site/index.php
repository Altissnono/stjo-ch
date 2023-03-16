<!---------------------------------------------------------------- SECTION: PHP ---------------------------------------------------------------->

<?php
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: ../login.php");
		exit(); 
}?>

<!--------------------------------------------------------------- SECTION: Onglet -------------------------------------------------------------->

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css" />
		<title>Page d'accueil</title>
        <meta charset= 'utf-8'>
        <link rel='icon' href='assets/ico/lien.ico' />
	</head>
	<body>


<!--------------------------------------------------------------- SECTION: Page ---------------------------------------------------------------->
		
		<div>
			<form class="box" action="" method="post">
    			<h1 class="box-title">Produit</h1>
    			<input type="button" onclick="window.location.href = 'ajout.php';" name="ajouter" value="Ajouter" class="box-button" />
    			<p class="box-register"></p>
    			<input type="button" onclick="window.location.href = 'supp.php';" name="supprimer" value="Supprimer" class="box-button" />
    			<p class="box-register"></p>
    			<input type="button" onclick="window.location.href = 'voir.php';"name="voir" value="Voir" class="box-button" />
    			<p class="box-register"></p>

			</form>

			<form class="box" action="" method="post">
   				<h1 class="box-title">Compte</h1>
   				<input type="button" onclick="window.location.href = '../logout.php';" name="deconnecter" value="Se déconnecter" class="box-button" />
   				<p class="box-register"></p>

			</form>


		</div>
	</body>
</html>