<!DOCTYPE html>

<!--------------------------------------------------------------- SECTION: Onglet -------------------------------------------------------------->

<html>
	<head>
		<link rel="stylesheet" href="stylesite.css" />
		<title>Inscription animal </title>
        <meta charset= 'utf-8'>
        <link rel='icon' href='assets/ico/lien.ico' />
	</head>
	<body>

<!---------------------------------------------------------------- SECTION: PHP ---------------------------------------------------------------->

<?php
require('config.php');

if (isset($_REQUEST['sexe'], $_REQUEST['naissance'], $_REQUEST['categorie'], $_REQUEST['deces'], $_REQUEST['coderace'], $_REQUEST['race'], $_REQUEST['nomdenaissance'], $_REQUEST['robe'], $_REQUEST['poil'])){
	
	$sexe = stripslashes($_REQUEST['sexe']);
	$sexe = mysqli_real_escape_string($conn, $sexe); 
	
	$naissance = stripslashes($_REQUEST['naissance']);
	$naissance = mysqli_real_escape_string($conn, $naissance);

	$categorie = stripslashes($_REQUEST['categorie']);
	$categorie = mysqli_real_escape_string($conn, $categorie);

	$deces = stripslashes($_REQUEST['deces']);
	$deces = mysqli_real_escape_string($conn, $deces);

	$coderace = stripslashes($_REQUEST['coderace']);
	$coderace = mysqli_real_escape_string($conn, $coderace);

	$race = stripslashes($_REQUEST['race']);
	$race = mysqli_real_escape_string($conn, $race);

    $robe = stripslashes($_REQUEST['robe']);
	$robe = mysqli_real_escape_string($conn, $robe);

    $poil = stripslashes($_REQUEST['poil']);
	$poil = mysqli_real_escape_string($conn, $poil);
	
	$nomdenaissance = stripslashes($_REQUEST['nomdenaissance']);
	$nomdenaissance = mysqli_real_escape_string($conn, $nomdenaissance);
	
	$query = "INSERT INTO `fiche-animal`(`sexe`, `naissance`, `categorie`, `deces`, `coderace`, `race`, `nomdenaissance`, `robe`, `poil`)
				VALUES ('$sexe', '$naissance', '$categorie', '$deces', '$coderace', '$race', '$robe', '$poil', '$nomdenaissance')";
	$res = mysqli_query($conn, $query);

    if($res){
    	
      header("Location: registerok.php");
       

			 
    }

}else{
?>

<!--------------------------------------------------------------- SECTION: Page ---------------------------------------------------------------->
			
		<form class="box" action="" method="post">
    		<h1 class="box-title">Fiche animal</h1>
			<label for="sexe">Sexe:</label>
			<select name="sexe" id="sexe" class="box-input">
				<option value="Masculin">Masculin</option>
				<option value="Féminin">Féminin</option>
			</select>
            <input type="text" class="box-input" name="nomdenaissance" placeholder="nom de naissance " required />
			<input type="text" class="box-input" name="naissance" placeholder="naissance" required />
    		<input type="text" class="box-input" name="categorie" placeholder="categorie" />
   			<input type="number" class="box-input" name="deces" placeholder="deces" required />
    		<input type="text" class="box-input" name="coderace" placeholder="code race"/>
    		<input type="text" class="box-input" name="race" placeholder="race"/>
            <input type="text" class="box-input" name="robe" placeholder="robe"/>
            <input type="text" class="box-input" name="poil" placeholder="poil"/>    		
    		<input type="submit" name="submit" value="Valide" class="box-button" />
		</form>
		<?php } ?>
	</body>
</html>

