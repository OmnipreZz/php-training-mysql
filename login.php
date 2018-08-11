<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata|Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
  </head>
  <body>

    <form class="mx-auto p-5 mt-5"  action="" method="post">
      <div class="form-group">
        <label for="username">Identifiant</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe </label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="form-group text-center">
        <button class="btn" type="submit" name="button">Se connecter</button>
      </div>
    </form>

    <?php
      if (isset($_POST['username']) && isset($_POST['password'])){
        require "connectUserDB.php";
        foreach ($dbUser->query('SELECT `username`, `password` FROM user') as $row) {
          if ($_POST['username'] == $row['username'] && $_POST['password'] == $row['password']) {
            session_start();
            $_SESSION['login'] = $_POST['username'];
            $_SESSION['pwd'] = $_POST['password'];
            header ('location: read.php');
          }
        }
      }
    ?>
    <?php
      // if (isset($_POST['username']) && isset($_POST['password'])){
      //   $login = $_POST['username'];
      //   $pwd = $_POST['password'];
      //   require "connectUserDB.php";
      //   $result = $dbUser->prepare("SELECT `username`, `password` FROM `user` WHERE `username` = ? AND `password` <= ?");
      //   $result->execute(array($login, sha1($pwd)));
      //   // print_r($result);
        
      //     if ($_POST['username'] == $row['username'] && $_POST['password'] == $row['password']) {
      //       session_start();
      //       $_SESSION['login'] = $_POST['username'];
      //       $_SESSION['pwd'] = $_POST['password'];
      //       header ('location: read.php');
      //     }
      // }
    ?>
  </body>
</html>
