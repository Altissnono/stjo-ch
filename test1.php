<?php

// Récupération des données de l'API en JSON
$url = 'https://stjo.soundco.me/api-co.php'; // remplacer par l'URL de votre API
$json = file_get_contents($url);
$data = json_decode($json, true);

// URL de l'image
$imageUrl = 'https://cdn.discordapp.com/attachments/683996090088816650/1086044759803572264/image.png';

// Tableau des enclos et leurs positions et noms
$enclosPositions = array(
    'enclos1' => array('x' => 100, 'y' => 200, 'nom' => 'Enclos 1'),
    'enclos2' => array('x' => 300, 'y' => 400, 'nom' => 'Enclos 2'),
    'enclos3' => array('x' => 500, 'y' => 600, 'nom' => 'Enclos 3'),
);

// Fonction pour récupérer les informations sur un enclos
function getEnclosInfo($enclos, $data) {
    $infos = '';
    foreach ($data as $animal) {
        if ($animal['enclos'] == $enclos) {
            $infos .= '<p>Nom de naissance : ' . $animal['nomdenaissance'] . '</p>';
            $infos .= '<p>Date de naissance : ' . $animal['naissance'] . '</p>';
            $infos .= '<p>Genre : ' . $animal['race'] . '</p>';
            $infos .= '<hr>'; // Ajout d'une ligne de séparation
        }
    }
    if ($infos == '') {
        $infos = '<p>Aucun animal trouvé dans cet enclos.</p>';
    }
    return $infos;
}

?>

<!-- Affichage de l'image et des points d'enclos -->
<div style="position: relative;">
    <img src="<?php echo $imageUrl; ?>" style="width:100%;" />
    <?php foreach ($enclosPositions as $enclos => $position): ?>
        <a href="#popup_<?php echo $enclos; ?>" style="position:absolute;left:<?php echo $position['x']; ?>px;top:<?php echo $position['y']; ?>px;" onclick="document.getElementById('popup_<?php echo $enclos; ?>').style.display='block'">
            <div class="enclos" title="<?php echo $position['nom']; ?>"></div>
        </a>
    <?php endforeach; ?>
</div>

<!-- Affichage des popups d'informations sur les enclos -->
<?php foreach ($enclosPositions as $enclos => $position): ?>
    <div id="popup_<?php echo $enclos; ?>" class="popup">
        <div class="popup-content">
            <a href="#" class="close">&times;</a>
            <h3><?php echo $position['nom']; ?></h3>
            <?php echo getEnclosInfo($enclos, $data); ?>
        </div>
    </div>
<?php endforeach; ?>

<!-- Styles CSS pour les popups et les enclos -->
<style>
    .popup {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8);
    }
    .popup-content {
        background-color: #FFF;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888
    }
    /* Styles pour les boutons de fermeture */
    .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }
    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }
    /* Styles pour les enclos */
    .enclos {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #F00;
        cursor: pointer;
    }
    .enclos:hover {
        background-color: #0F0;
    }
    
    /* Styles pour les informations des enclos */
    p {
        margin-bottom: 5px;
    }
    h3 {
        margin-top: 0;
    }
    .enclos {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #F00;
        cursor: pointer;
    }
    .enclos:hover {
        background-color: #0F0;
    }
    
    /* Styles pour les informations des enclos */
    p {
        margin-bottom: 5px;
    }
    h3 {
        margin-top: 0;
    }
    /* Styles pour les enclos */
    .enclos {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #F00;
        cursor: pointer;
    }
    .enclos:hover {
        background-color: #0F0;
    }
    
    /* Styles pour les informations des enclos */
    p {
        margin-bottom: 5px;
    }
    h3 {
        margin-top: 0;
    }
    </style>
    <script>
    
    // Ferme la popup en appuyant sur la touche "Escape"
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        document.querySelectorAll('.popup').forEach(function(popup) {
            popup.style.display = 'none';
        });
    }
});

// Ferme la popup lorsqu'on clique sur le bouton de fermeture
document.querySelectorAll('.close').forEach(function(button) {
    button.addEventListener('click', function() {
        var popup = this.closest('.popup');
        popup.style.display = 'none';
    });
});

    
    </script>



