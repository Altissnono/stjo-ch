<!DOCTYPE html>

<!--------------------------------------------------------------- SECTION: Onglet -------------------------------------------------------------->

<html>
    <head>
        <link rel="stylesheet" href="css.css" />
        <title>Supression d'un produit</title>
        <meta charset= 'utf-8'>
        <link rel='icon' href='assets/ico/lien.ico' />
    </head>
    <body>




<!---------------------------------------------------------------- SECTION: PHP ---------------------------------------------------------------->

<?php
                
require('configsite.php');




if (!$conn) {
  die("La Connexion a échouée: " . mysqli_connect_error());
}

//Requête SQL pour supprimer un enregistrement
if (isset($_REQUEST['id_article'])){

$id_article = 'idarticle'; 

$sql = "DELETE FROM `article` WHERE id_article='$id_article'";

if (mysqli_query($conn, $sql)) {
  echo "Enregistrement supprimé avec succés";
} else {
  echo "Erreur lors de la suppression : " . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
                

<!--------------------------------------------------------------- SECTION: Page ---------------------------------------------------------------->
            <form class="box" action="" method="post">
            <h1 class="box-title">Article</h1>
            <input type="text" class="box-input" name="idarticle" placeholder="Id article " required />
            <input type="submit" name="submit" value="Supprimer" class="box-button" />
            <p class="box-register"><a href="index.php">Finis</a></p>
            <?php if (! empty($message)) { ?>
            <p class="errorMessage"><?php echo $message; ?></p>

            <?php } ?>
        </form>
        
    
    </body>
</html>