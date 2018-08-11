


	

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
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
		require 'connectRandoDB.php';
		include 'nav.php';
	$v = $_GET['id'];
	$sth = $pdo->prepare('SELECT*FROM hiking WHERE id = :id');
	$sth->execute(array(":id" => $v));
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	// print_r($result);
	$pdo = null;


	function selectedDiff($diff) {
		global $result;
		if ($result[0]['difficulty'] == $diff) {
			echo 'selected';
		}
	}

	function selectedDispo($dispo) {
		global $result;
		if ($result[0]['available'] == $dispo) {
			echo 'selected';
		}
	}
?>
	
	<br>
	<form class="mx-auto p-5"  action="" method="post">
		<h3 class="text-center mb-4">Modifier une randonnée</h3>
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" required name="name" value="<?php echo $result[0]['name'];?>">
		</div>

		<div class="form-group">
			<label for="difficulty">Difficulté</label>
			<select name="difficulty" class="form-control">
				<option <?php selectedDiff('très facile');?> value="très facile">Très facile</option>
				<option <?php selectedDiff('facile');?> value="facile">Facile</option>
				<option <?php selectedDiff('moyen');?> value="moyen">Moyen</option>
				<option <?php selectedDiff('difficile');?> value="difficile">Difficile</option>
				<option <?php selectedDiff('très difficile');?> value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div class="form-group">
			<label for="distance">Distance</label>
			<input type="text" class="form-control" required name="distance" value="<?php echo $result[0]['distance'];?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" class="form-control" required name="duration" value="<?php echo $result[0]['duration'];?>">
		</div>
		<div class="form-group">
			<label for="height_difference">Dénivelé</label>
			<input type="text" class="form-control" required name="height_difference" value="<?php echo $result[0]['height_difference'];?>">
		</div>
		<div class="form-group">
			<label for="available">Disponible</label>
			<select name="available" class="form-control">
				<option <?php selectedDispo('oui');?> value="oui">Oui</option>
				<option <?php selectedDispo('non');?> value="non">Non</option>
			</select>
		</div>
		<div class="form-group text-center">
			<button class="btn mt-3" type="submit" name="button">Envoyer</button>
		</div
	</form>

	<?php
	if (isset($_POST['button']) && isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
		require 'connectRandoDB.php';
		$sth = $pdo->prepare("UPDATE `hiking` SET `name`=:name, `difficulty`=:difficulty, `distance`=:distance, `duration`=:duration, `height_difference`=:height_difference, `available`=:available WHERE `id` = $v ");
		$sth->execute(array(
			"name" => $_POST['name'],
			"difficulty" => $_POST['difficulty'],
			"distance" => $_POST['distance'],
			"duration" => $_POST['duration'],
			"height_difference" => $_POST['height_difference'],
			"available" => $_POST['available']
		));
		echo '"La randonnée a été modifiée avec succès."';
		$pdo = null;
	}
?>



</body>
</html>
