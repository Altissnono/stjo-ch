<link rel="stylesheet" href="style.css" />
<?php
// Constantes de connexion à la base de données
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'projet');

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
$tableau = array();
while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
    $tableau[] = $ligne;
}

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
    <h1>Liste des animaux</h1>
    <table>
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
                        <input type="hidden" name="id" value="<?= $ligne['id'] ?>">
                        <label>Sexe :</label>
                        <input type="text" name="sexe" value="<?= $ligne['sexe'] ?>"><br>
                        <label>Nom de naissance :</label>
                        <input type="text" name="nomdenaissance" value="<?= $ligne['nomdenaissance'] ?>"><br>
                        <label>Naissance :</label>
                        <input type="text" name="naissance" value="<?= $ligne['naissance'] ?>"><br>
                        <label>Catégorie :</label>
                        <input type="text" name="categorie" value="<?= $ligne['categorie'] ?>"><br>
                        <label>Décès :</label>
                        <input type="text" name="deces" value="<?= $ligne['deces'] ?>"><br>
                        <label>Code race :</label>
                        <input type="text" name="coderace" value="<?= $ligne['coderace'] ?>"><br>
                        <label>Race :</label>
                        <input type="text" name="race" value="<?= $ligne['race'] ?>"><br>
                        <label>Poil :</label>
                        <input type="text" name="poil" value="<?= $ligne['poil'] ?>"><br>
                        <label>Robe :</label>
                        <input type="text" name="robe" value="<?= $ligne['robe'] ?>"><br>
                        <button type="submit" name="modifier">Enregistrer</button>
                        <button type="button" onclick="cacherFormulaireModification(<?= $ligne['id'] ?>)">Annuler</button>
                    </form>
                </td>
            </tr>
        <?php } ?>

    </table>
    <script>
        function afficherFormulaireModification(id) {
            var formulaire = document.getElementById('form-' + id);
            formulaire.style.display = 'block';
        }

        function cacherFormulaireModification(id) {
            var formulaire = document.getElementById('form-' + id);
            formulaire.style.display = 'none';
        }
    </script>
</body>
</html>
