<?php
header('Access-Control-Allow-Origin: *'); // Autorise les requêtes provenant de domaines différents

// Connexion à la base de données
$servername = "localhost";
$username = "u150008834_stjo";
$password = "QODrg9b*";
$dbname = "u150008834_stjo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer les données de la table "fiche-animal"
$sql = "SELECT * FROM `fiche-animal`";
$result = $conn->query($sql);

// Convertir les données en tableau associatif
$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Convertir le tableau en JSON et l'afficher
header('Content-Type: application/json');
echo json_encode($data);

// Fermer la connexion à la base de données
$conn->close();

?>