<?php
// Informations d'identification

define('DB_SERVER', 'sql966.main-hosting.eu');
define('DB_USERNAME', 'u150008834_stjo');
define('DB_PASSWORD', 'OEJYt;q$X8');
define('DB_NAME', 'u150008834_stjo');
 
// Connexion a la base de donnees MySQL 

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Verifier la connexion

if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>