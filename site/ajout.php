<!DOCTYPE html>

<!--------------------------------------------------------------- SECTION: Onglet -------------------------------------------------------------->

<html>
	<head>
		<link rel="stylesheet" href="css.css" />
		<title>Ajout d'un produit</title>
        <meta charset= 'utf-8'>
        <link rel='icon' href='assets/ico/lien.ico' />
	</head>
	<body>




<!---------------------------------------------------------------- SECTION: PHP ---------------------------------------------------------------->

<?php
                
require('configsite.php');

if (isset($_POST['idarticle'])){
$idarticle = stripslashes($_REQUEST['idarticle']);
$design = stripslashes($_REQUEST['design']);
$prix = stripslashes($_REQUEST['prix']);
$categorie = stripslashes($_REQUEST['categorie']);

$sql = "INSERT INTO article (id_article, design, prix, categorie)
VALUES ('$idarticle', '$design', '$prix', '$categorie')";

if (mysqli_query($conn, $sql)) {
  header("Location: ajoutok.php");
} else {
 $message = "ERREUR !!  " . "<br>" . mysqli_error($conn);
  
}


}
    mysqli_close($conn);
?>
                

<!--------------------------------------------------------------- SECTION: Page ---------------------------------------------------------------->
			<form class="box" action="" method="post">
            <h1 class="box-title">Article</h1>
            <input type="text" class="box-input" name="idarticle" placeholder="Id article " required />
            <input type="text" class="box-input" name="design" placeholder="Design" required />
            <input type="number" class="box-input" name="prix" placeholder="Prix" />
            <input type="text" class="box-input" name="categorie" placeholder="Categorie" required />
            <input type="submit" name="submit" value="Ajouter" class="box-button" />
            <p class="box-register"><a href="index.php">Finis</a></p>
            <?php if (! empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>

            <?php } ?>
        </form>
		
	
	</body>
</html>