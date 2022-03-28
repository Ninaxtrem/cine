<?php
include "traitement.php"; 
session_start();

$sql1 = "SELECT * FROM cn_film";
$requete1= $bdd->prepare($sql1);
$requete1->execute();



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/cine.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>cinema</title>
</head>
<body>
<!-- navbar -->
<nav>
  <img src="assets/img/METROPOLIS_LOGO_ROND.png">
  
  <div class="bouton">
    <p>
     <a href="profil.php">  bonjour <?php echo $_SESSION['nom']; ?> </a>
   </p>
   <div class="bouton">
    <p>
     <a href="deco.php">Déconnexion</a>
   </p>
  </div>


  </div>
</nav>
<!-- fin nav-->
<!-- carousel -->
<div class="gallery">
    <div class="gallery-container">
    <?php

// <a href="film.php?id_film<?php echo $resultat1["id_Film"]">

$i = 1;
    while ($resultat1 =$requete1->fetch()){
   ?>
     <img class="gallery-item gallery-item-<?php echo $i;?>" src="<?php echo $resultat1["image_film"]?>" data-index="<?php echo $i;?>">
      <?php $i++;
    }
    
      ?>
    </div>
    <div class="gallery-controls"></div>
  </div>

<!-- fin caroussel-->
<!--slid-->
<div class="carousel">
  <div class="carousel__inner">
  <?php
   $sql5 = "SELECT * FROM cn_film";
$requete5= $bdd->prepare($sql5);
$requete5->execute();
  
     while ($resultat5 =$requete5->fetch()){
      ?> 
    <div class="carousel__box">
      <a href="film.php?id_film=<?php echo $resultat5["id_film"];?>">
      <img src="<?php echo $resultat5["image_film"];?>"></a>
    </div>
    <?php

}

?>
  </div>

  <button type="button" class="carousel__control carousel__control--left">
    <i class="fa fa-angle-left"></i>
  </button>
  
  <button type="button" class="carousel__control carousel__control--right">
    <i class="fa fa-angle-right"></i>
  </button>
</div>
<div class="carousel2">
  <div class="carousel__inner">
    <div class="carousel__box">
      <img src="https://images-na.ssl-images-amazon.com/images/I/91+5a2Dr+5L.jpg">
    </div>
    <div class="carousel__box">
      <img src="https://images-na.ssl-images-amazon.com/images/I/91+5a2Dr+5L.jpg">
    </div>
    <div class="carousel__box">
      <img src="https://images-na.ssl-images-amazon.com/images/I/91+5a2Dr+5L.jpg">
    </div>
    <div class="carousel__box">
      <img src="https://images-na.ssl-images-amazon.com/images/I/91+5a2Dr+5L.jpg">
    </div>
    <div class="carousel__box">
      <img src="https://images-na.ssl-images-amazon.com/images/I/91+5a2Dr+5L.jpg">
    </div>
    <div class="carousel__box">
      <img src="https://images-na.ssl-images-amazon.com/images/I/91+5a2Dr+5L.jpg">
    </div>
    <div class="carousel__box">
      <img src="https://images-na.ssl-images-amazon.com/images/I/91+5a2Dr+5L.jpg">
    </div>
    <div class="carousel__box">
      <img src="https://images-na.ssl-images-amazon.com/images/I/91+5a2Dr+5L.jpg">
    </div>
    <div class="carousel__box">
      <img src="https://images-na.ssl-images-amazon.com/images/I/91+5a2Dr+5L.jpg">
    </div>
  </div>
  
  <button type="button" class="carousel__control carousel__control--left">
    <i class="fa fa-angle-left"></i>
  </button>
  
  <button type="button" class="carousel__control carousel__control--right">
    <i class="fa fa-angle-right"></i>
  </button>
</div>
<!--fin slid-->
 <!--footer -->
 <div class="footer">
  <div class="icone1"><i class="fa-solid fa-desktop fa-10x"></i> 
  <p>TV
  </p>
  </div>
  <div class="icone2"><i class="fa-solid fa-mobile-screen-button fa-10x"></i>
  <p>Smartphone
  </p>
</div>
  <div class="icone3"><i class="fa-solid fa-tablet-screen-button fa-10x"></i>
  <p>Tablette
  </p>
</div>
  <div class="icone4"><i class="fa-solid fa-gamepad fa-10x"></i>
  <p>Console
  </p>
</div>
  </div>
  <div class="copy">
  <img src="assets/img/METROPOLIS_LOGO_ROND.png">
 <p>Copyright METROPOLIS</p>
</div>
 <!-- fin footer -->

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/cine.js"></script>




</body>
</html>