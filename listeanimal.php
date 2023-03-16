<link rel="stylesheet" href="style.css" />
<?php
// Constantes de connexion à la base de données
define('DB_SERVER', 'sql966.main-hosting.eu');
define('DB_USERNAME', 'u150008834_stjo');
define('DB_PASSWORD', 'OEJYt;q$X8');
define('DB_NAME', 'u150008834_stjo');

// Connexion à la base de données MySQL avec PDO
try {
    $db = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Traitement de la suppression
if (isset($_POST['supprimer'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM `fiche-animal` WHERE `id` = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    header("Location: index.php");
}

// Traitement de la modification
if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $nomdenaissance = $_POST['nomdenaissance'];
    $sexe = $_POST['sexe'];
    $naissance = $_POST['naissance'];
    $categorie = $_POST['categorie'];
    $deces = $_POST['deces'];
    $coderace = $_POST['coderace'];
    $race = $_POST['race'];
    $poil = $_POST['poil'];
    $robe = $_POST['robe'];
    
    $sql = "UPDATE `fiche-animal` SET `sexe` = ?, `naissance` = ?, `categorie` = ?, `deces` = ?, `coderace` = ?, `race` = ?, `nomdenaissance` = ?, `poil` = ?, `robe` = ? WHERE `id` = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$sexe, $naissance, $categorie, $deces, $coderace, $race, $nomdenaissance, $poil, $robe, $id]);
    
    header("Location: ficheanimal4.php");
}

// Requête SQL pour récupérer des données
$sql = "SELECT * FROM `fiche-animal`";

// Exécution de la requête et récupération des données dans un tableau
$resultat = $db->query($sql);
$tableau = $resultat->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des animaux</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
            th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid black;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .form-modification {
        display: none;
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
</head>
<body>
    <h1 style="text-align:center; text-shadow: 2px 2px 4px #044F78;">Liste des animaux</h1>
    <table>
    <thead>
        <tr>
            <th>id</th>
            <th>Nom de naissance</th>
            <th>Sexe</th>
            <th>Naissance</th>
            <th>Catégorie</th>
            <th>Décès</th>
            <th>Code race</th>
            <th>Race</th>
            <th>Poil</th>
            <th>Robe</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tableau as $ligne) { ?>
            <tr>
            <td><?= $ligne['id'] ?></td>
            <td><?= $ligne['nomdenaissance'] ?></td>
                <td><?= $ligne['sexe'] ?></td>
                <td><?= $ligne['naissance'] ?></td>
                <td><?= $ligne['categorie'] ?></td>
                <td><?= $ligne['deces'] ?></td>
                <td><?= $ligne['coderace'] ?></td>
                <td><?= $ligne['race'] ?></td>
                <td><?= $ligne['poil'] ?></td>
                <td><?= $ligne['robe'] ?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $ligne['id'] ?>">
                        <button type="submit" name="supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cet animal ?')">Supprimer</button>
                    </form>
                    <button onclick="afficherFormulaireModification(<?= $ligne['id'] ?>)">Modifier</button>
                    <form class="form-modification" id="form-<?= $ligne['id'] ?>" action="" method="POST">
                    //    <input type="hidden" name="id" value="<?= $ligne['id'] ?>">
                    //    <label>Sexe :</label>
                    //    <input type="text" name="sexe" value="<?= $ligne['sexe'] ?>"><br>
                    //    <label>Nom de naissance :</label>
                    //    <input type="text" name="nomdenaissance" value="<?= $ligne['nomdenaissance'] ?>"><br>
                    //    <label>Naissance :</label>
                    //    <input type="text" name="naissance" value="<?= $ligne['naissance'] ?>"><br>
                    //    <label>Catégorie :</label>
                    //    <input type="text" name="categorie" value="<?= $ligne['categorie'] ?>"><br>
                    //    <label>Décès :</label>
                    //    <input type="text" name="deces" value="<?= $ligne['deces'] ?>"><br>
                    //     <label>Code race :</label>
                    //    <input type="text" name="coderace" value="<?= $ligne['coderace'] ?>"><br>
                    //    <label>Race :</label>
                    //    <input type="text" name="race" value="<?= $ligne['race'] ?>"><br>
                    //    <label>Poil :</label>
                    //    <input type="text" name="poil" value="<?= $ligne['poil'] ?>"><br>
                    //   <label>Robe :</label>
                    //    <input type="text" name="robe" value="<?= $ligne['robe'] ?>"><br>
                    //    <button type="submit" name="modifier">Enregistrer</button>
                    //    <button type="button" onclick="cacherFormulaireModification(<?= $ligne['id'] ?>)">Annuler</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
        function afficherFormulaireModification(id) {
  // Récupérer le formulaire
  var formulaire = document.getElementById('form-' + id);

  // Ouvrir la popup
  var popup = window.open('', 'Modification', 'width=500,height=500');

  // Centrer la popup
  var left = screen.width / 2 - 250;
  var top = screen.height / 2 - 250;
  popup.moveTo(left, top);

  // Écrire le contenu HTML de la popup
  popup.document.write('<html><head><title>Formulaire de modification</title>');
  popup.document.write('<style>body {background-color: gray; color: white; text-align: center;}');
  popup.document.write('input[type="text"] {background-color: white; color: black; border: 1px solid blue; padding: 5px; margin: 5px;}');
  popup.document.write('button[type="submit"], button[type="button"] {background-color: blue; color: white; border: none; padding: 5px; margin: 5px; cursor: pointer;}</style>');
  popup.document.write('</head><body>');
  popup.document.write('<h1>Formulaire de modification</h1>');
  popup.document.write('<form class="form-modification" id="form-' + id + '" action="" method="POST">');
  popup.document.write('<input type="hidden" name="id" value="' + id + '">');
  popup.document.write('<label>Sexe :</label>');
  popup.document.write('<input type="text" name="sexe" value="' + formulaire.elements["sexe"].value + '"><br>');
  popup.document.write('<label>Nom de naissance :</label>');
  popup.document.write('<input type="text" name="nomdenaissance" value="' + formulaire.elements["nomdenaissance"].value + '"><br>');
  popup.document.write('<label>Naissance :</label>');
  popup.document.write('<input type="text" name="naissance" value="' + formulaire.elements["naissance"].value + '"><br>');
  popup.document.write('<label>Catégorie :</label>');
  popup.document.write('<input type="text" name="categorie" value="' + formulaire.elements["categorie"].value + '"><br>');
  popup.document.write('<label>Décès :</label>');
  popup.document.write('<input type="text" name="deces" value="' + formulaire.elements["deces"].value + '"><br>');
  popup.document.write('<label>Code race :</label>');
  popup.document.write('<input type="text" name="coderace" value="' + formulaire.elements["coderace"].value + '"><br>');
  popup.document.write('<label>Race :</label>');
  popup.document.write('<input type="text" name="race" value="' + formulaire.elements["race"].value + '"><br>');
  popup.document.write('<label>Poil :</label>');
  popup.document.write('<input type="text" name="poil" value="' + formulaire.elements["poil"].value + '"><br>');
  popup.document.write('<label>Robe :</label>');
  popup.document.write('<input type="text" name="robe" value="' + formulaire.elements["robe"].value + '"><br>');
  popup.document.write('<button type="submit" name="modifier">Enregistrer</button>');
  popup.document.write('<button type="button" onclick="popup.close()">Annuler</button>');
  popup.document.write('</form></body></html>');

  // Fermer la fenêtre parente quand la popup est fermée
  popup.onunload = function() {
    window.close();
  };
}


        function cacherFormulaireModification(id) {
            var formulaire = document.getElementById('form-' + id);
            formulaire.style.display = 'none';
        }
</script>