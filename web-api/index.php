<!---------------------------------------------------------------- SECTION: PHP ---------------------------------------------------------------->

<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}
?>

<!DOCTYPE html>

<!--------------------------------------------------------------- SECTION: Onglet -------------------------------------------------------------->

<html>
	<head>
		<link rel="stylesheet" href="css.css" />
		<link rel="stylesheet" href="css/css2.css" />
		<link rel="stylesheet" href="css/infinite.css" />
		<meta http-equiv="refresh" content="3;/enregistrement/forum.php" />
		<title>Redirection ...</title>
        <meta charset= 'utf-8'>
        <link rel='icon' href='assets/ico/lien.ico' />
	</head>
	<body>

<!--------------------------------------------------------------- SECTION: Page ---------------------------------------------------------------->

		<div class="sucess"><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 	<br> <br> <br> <br>
			<h1>Bonjour <?php echo $_SESSION['username']; ?> !</h1>
			<h2>Heureux de vous voir </h2>
			<img src="assets/chargement.png" width="89" height="auto" class="rotating-css"/>
		</div>

        <div>
        	<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>

		</div>
	</body>
</html>