<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata|Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
</head>
<body>
	<?php
  		include "nav.php";
	?>
	
	<br>
	<form class="mx-auto p-5" action="" method="post">
		<h3 class="text-center mb-4">Ajouter une randonnée</h3>
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" value="" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="difficulty">Difficulté</label>
			<select name="difficulty" class="form-control">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div class="form-group">
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="" required class="form-control">
		</div>
		<div class="form-group">
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="" required class="form-control">
		</div>
		<div class="form-group">
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="" required class="form-control">
		</div>
		<div class="form-group">
			<label for="available">Disponible</label>
			<select name="available" class="form-control">
				<option value="oui">Oui</option>
				<option value="non">Non</option>
			</select>
		</div>
		<div class="form-group text-center">
			<button class="btn mt-3" type="submit" name="button">Envoyer</button>
		</div
	</form>

	<?php
		if (isset($_POST['button']) && isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
      		require 'connectRandoDB.php';
			$sth = $pdo->prepare("INSERT INTO `hiking` (`name`, `difficulty`, `distance`, `duration`, `height_difference`, `available`)
				VALUES(:name, :difficulty, :distance, :duration, :height_difference, :available)");
			$sth->execute(array(
				"name" => $_POST['name'],
				"difficulty" => $_POST['difficulty'],
				"distance" => $_POST['distance'],
				"duration" => $_POST['duration'],
				"height_difference" => $_POST['height_difference'],
				"available" => $_POST['available']
			));
			echo '"La randonnée a été ajoutée avec succès."';
			$pdo = null;
		}
      ?>
</body>
</html>
