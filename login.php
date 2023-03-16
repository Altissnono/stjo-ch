<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
        <meta charset= 'utf-8'>
        <link rel='icon' href='assets/ico/lien.ico' />
        <link rel="stylesheet" href="css.css" />
	</head>
	<body>
		<?php
		require('config.php');
		session_start();
		
		if (isset($_POST['username'])){
			$username = stripslashes($_REQUEST['username']);
			$username = mysqli_real_escape_string($conn, $username);
			$password = stripslashes($_REQUEST['password']);
			$password = mysqli_real_escape_string($conn, $password);
			$query = "SELECT * FROM `utilisateurs` WHERE username='$username' and password='".hash('sha256', $password)."'";
			$result = mysqli_query($conn,$query) or die(mysql_error());
			$rows = mysqli_num_rows($result);
			if($rows==1){
				$_SESSION['username'] = $username;
				header("Location: forum.php");
			}else{
				$message = "Le nom d'utilisateur ou le mot de passe est incorrect. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
				    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				    Veuillez réessayer ! ";
			}
		}
		?>
		
		<form class="box" action="" method="post" name="login">
			<h1 class="box-title">Connexion</h1>
			<input type="text" class="box-input" name="username" placeholder="Nom">
			<input type="password" class="box-input" name="password" placeholder="Mot de passe">
			<input type="submit" value="Connexion " name="submit" class="box-button">
			<p class="box-register"><a href="register.php" >Nouveau utilisateur</a></p>

			<?php if (! empty($message)) { ?>
			<p class="errorMessage"><?php echo $message; ?></p>
			<?php } ?>

		</form>
	</body>
</html>
