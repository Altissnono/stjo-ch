<!DOCTYPE html>

<!--------------------------------------------------------------- SECTION: Onglet -------------------------------------------------------------->

<html>
	<head>
		<link rel="stylesheet" href="css.css" />
		<title>Inscription</title>
        <meta charset= 'utf-8'>
        <link rel='icon' href='assets/ico/lien.ico' />
	</head>
	<body>

<!---------------------------------------------------------------- SECTION: PHP ---------------------------------------------------------------->

<?php
require('config.php');

if (isset($_REQUEST['username'], $_REQUEST['prenom'], $_REQUEST['age'], $_REQUEST['adresse'], $_REQUEST['ville'], $_REQUEST['email'], $_REQUEST['password'])){
	
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	
	$prenom = stripslashes($_REQUEST['prenom']);
	$prenom = mysqli_real_escape_string($conn, $prenom);

	$age = stripslashes($_REQUEST['age']);
	$age = mysqli_real_escape_string($conn, $age);

	$adresse = stripslashes($_REQUEST['adresse']);
	$adresse = mysqli_real_escape_string($conn, $adresse);

	$ville = stripslashes($_REQUEST['ville']);
	$ville = mysqli_real_escape_string($conn, $ville);

	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	
	$query = "INSERT into `utilisateurs` (username, prenom, age, adresse, ville, email, type, password)
				VALUES ('$username', '$prenom', '$age', '$adresse', '$ville', '$email', 'user', '".hash('sha256', $password)."')";
	$res = mysqli_query($conn, $query);

    if($res){
    	
      header("Location: registerok.php");
       

			 
    }

}else{
?>

<!--------------------------------------------------------------- SECTION: Page ---------------------------------------------------------------->
			
		<form class="box" action="" method="post">
    		<h1 class="box-title">S'inscrire</h1>
			<input type="text" class="box-input" name="username" placeholder="Nom " required />
			<input type="text" class="box-input" name="prenom" placeholder="Prenom" required />
    		<input type="text" class="box-input" name="email" placeholder="Email" />
   			<input type="number" class="box-input" name="age" placeholder="Age" required />
    		<input type="text" class="box-input" name="adresse" placeholder="Adresse"/>
    		<input type="text" class="box-input" name="ville" placeholder="Ville"/>
    		<input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    		<input type="submit" name="submit" value="S'inscrire" class="box-button" />
    		<p class="box-register"><a href="login.php">Déjà inscrit</a></p>
		</form>
		<?php } ?>
	</body>
</html>