<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
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
  <div class="container-fluid home">
    <table class="table">
      <thead class="text-danger">
        <th scope="col">Nom</th>
        <th scope="col">Difficulté</th>
        <th scope="col">Distance</th> 
        <th scope="col">Durée</th>
        <th scope="col">Dénivelé</th>
        <th scope="col">Disponible</th>
      </thead>
      <?php
      require 'connectRandoDB.php';
      foreach ($pdo->query('SELECT*FROM hiking') as $row) { ?>
      <tbody>
        <tr>
          <th class="name" scope="row"><?php echo $row['name'];?></th>
          <td><?php echo $row['difficulty'];?></td>
          <td><?php echo $row['distance'];?></td>
          <td><?php echo $row['duration'];?></td>
          <td><?php echo $row['height_difference'];?></td>
          <td><?php echo $row['available'];?></td>
          <?php
          if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) { ?>
          <td><a href="update.php?id= <?php echo $row['id'];?>"><i class="fas fa-edit"></i></a></td>
          <?php 
          }
          if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) { ?>
          <td><a href="delete.php?id= <?php echo $row['id'];?>"><i class="fas fa-trash-alt"></i></a></td>
          <?php } ?>
        </tr>
      </tbody>
      <?php 
      }
      $pdo = null;
      ?>
    </table>
    <?php
    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) { ?>
    <div class="text-center">
      <buton class="btn" ><a href="./create.php">Ajouter une randonnée<a/></buton>
    </div>
    <?php } ?>
  </div>
  </body>
</html>
