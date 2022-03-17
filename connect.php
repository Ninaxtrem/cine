<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/connect.css">
    <title>Inscription</title>
</head>
<body>
<!-- sing ing -->

<div class="logo">
        <a href="#">
          <img src="assets/img/METROPOLIS_LOGO_ROND.png"/></a>
      </div>
    </header>
    <div class="login-sqare">
      <h1 class="title">Connection</h1>
      <br>
      <form  class="sign-form" action="connection.php" method="POST">
      <?php
      if(isset($_GET['message'])) {
        if($_GET['message'] == "success") {
        echo"votre inscription a bien été prise en compte";
        }

          if($_GET['message'] == "error") {
          echo"<div class=titre>Le mail rentré n'existe pas</div>";
          }
      }
    
      ?>
        <div>
          <input
            class="input"
            type="email"
            name="email"
            placeholder="Email or phone number"
            required
            autocomplete="off"
          />
        </div>
        <div>
          <input
            class="input"
            type="password"
            name="password"
            placeholder="Password"
            required
            autocomplete="off"
          />
        </div>
        <div><input type="submit" class="button">Sign In</button></div>
      </form>
        <div class="check-div">
          <label class="container">
            <span class="remember-text"> Se souvenir de moi </span>
            <input type="checkbox" checked="checked" />
            <span class="checkmark"></span>
          </label>





</body>
</html>