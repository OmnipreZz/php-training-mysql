<?php
session_start();
?>

<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">Liste Des Randonnées</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="btn" href="./read.php">Accueil</a>
      </li>
      <?php
      if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) { ?>
      <li class="nav-item">
        <a class="btn" href="./logout.php"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
      </li>
      <?php } else { ?>
      <li class="nav-item">
        <a class="btn" href="./login.php"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>