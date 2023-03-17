<!DOCTYPE html>
<html>
<head>
	<title>Exemple de carte avec des points</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style>
		#map {
			position: relative;
			display: inline-block;
			background-image: url('https://cdn.discordapp.com/attachments/683996090088816650/1086044759803572264/image.png');
			background-size: contain;
			background-repeat: no-repeat;
			width: 1000px;
			height: 700px;
		}
		.point {
			position: absolute;
			background-color: #f00;
			border-radius: 50%;
			width: 10px;
			height: 10px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div id="map">
		<div class="point" id="point1" style="left: 100px; top: 200px;"></div>
		<div class="point" id="point2" style="left: 500px; top: 300px;"></div>
		<div class="point" id="point3" style="left: 800px; top: 500px;"></div>
		<div class="point" id="point5" style="left: 1200px; top: 700px;"></div>
	</div>
	<script>
		$(function() {
			$('.point').click(function() {
				var pointId = $(this).attr('id');
				var animalLocation = getAnimalLocation(pointId);
				if (animalLocation) {
					alert('Le point ' + pointId + ' correspond à l\'emplacement de l\'animal ' + animalLocation);
				} else {
					alert('Le point ' + pointId + ' ne correspond à aucun emplacement d\'animal.');
				}
			});

			function getAnimalLocation(pointId) {
				// Code pour récupérer les informations de l'animal correspondant au point dans la base de données
				// Retourne le nom de la localisation de l'animal, ou false si aucune localisation n'est trouvée
				// À remplacer par votre propre code
				var animals = [
					{ name: 'Lion', location: 'point1' },
					{ name: 'Girafe', location: 'point2' },
					{ name: 'Zèbre', location: 'point3' },
					{ name: 'Tigre', location: 'point1' },
					{ name: 'Éléphant', location: 'point4' }
				];
				var matchingAnimals = animals.filter(function(animal) {
					return animal.location === pointId;
				});
				if (matchingAnimals.length === 1) {
					return matchingAnimals[0].name;
				} else if (matchingAnimals.length > 1) {
					var animalNames = matchingAnimals.map(function(animal) {
						return animal.name;
					});
					return 'Plusieurs animaux trouvés:' + animalNames.join(', ');
} else {
return false;
}
}
});
</script>

</body>
</html>
