<?php

// Récupérer la valeur de "loc" envoyée depuis le client
$loc = $_POST['loc'];

// Simuler une requête à la base de données pour obtenir des animaux correspondant à la localisation
$animaux = [
    ['nom' => 'Chat', 'description' => 'Un chat domestique'],
    ['nom' => 'Chien', 'description' => 'Un chien domestique'],
    ['nom' => 'Ours', 'description' => 'Un ours sauvage'],
    ['nom' => 'Lion', 'description' => 'Un lion sauvage'],
    ['nom' => 'Singe', 'description' => 'Un singe sauvage'],
    ['nom' => 'Panda', 'description' => 'Un panda sauvage']
];

// Convertir les données en JSON et les renvoyer au client
echo json_encode($animaux);

?>