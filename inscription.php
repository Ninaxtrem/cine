<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/inscri.css">
  <title>Inscription</title>
</head>

<body>
  <div class="logo">
    <a href="#">
      <img src="assets/img/METROPOLIS_LOGO_ROND.png" /></a>
  </div>
  <div class="login-sqare">
    <h1 class="title">Inscrption</h1>
    <?php
      if(isset($_GET['message'])){
        if($_GET['message'] == "error2") {
        echo"Pseudo utilisé ";
        }
      }
      if(isset($_GET['message'])){
        if($_GET['message'] == "error") {
        echo"le mot de passe n'est pas identique";
        }
      }

      if(isset($_GET['message'])){
        if($_GET['message'] == "error3") {
        echo"mail deja utiliser";
        }
      }
      ?>
    <form action="inscriptionbdd.php" method="POST" class="sign-form">
      <div>
        <input class="input" type="text" name="nom" placeholder="Nom" required autocomplete="off" />
      </div>
      <div>
        <input class="input" type="email" name="email" placeholder="Mail" required autocomplete="off" />
      </div>
      <div>
        <input class="input" type="password" name="mdp" placeholder="Mot de passe" required autocomplete="off" />
      </div>

      <div><input type="submit" class="button">Sign In</input></div>
      <!-- <div><button class="button">Sign In</button></div> -->

      <div class="check-div">
        <label class="container">
          <span class="remember-text">Se souvenir de moi </span>
          <input type="checkbox" checked="checked" />
          <span class="checkmark"></span>
        </label>

      </div>
      </form>
  </div>
</body>

</html>
