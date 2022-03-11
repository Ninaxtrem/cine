<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="  " rel="stylesheet">
    <link rel="stylesheet" href="assets/css/cine.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
    <title>cinema</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include("traitement.php")
?>
<!-- navbar -->
<nav>
  <img src="assets/img/METROPOLIS_LOGO_ROND.png">
  
  <div class="bouton">
    <p>
     <a href="profil.php">Profil</a>
   </p>
  </div>
</nav>
<!-- fin nav-->
<?php 
$sql = "SELECT * FROM cn_film WHERE id_Film=".$_GET["id_film"]."";
$requete=$bdd->prepare($sql);
$requete->execute();
$affiche = $requete->fetch(); 

$sql2 = "SELECT * FROM travailler t,cn_equipe ce, cn_film cf WHERE t.id_equipe=ce.id_equipe AND t.id_Film=cf.id_Film AND
 cf.id_Film=".$_GET["id_film"]."";
$requete2=$bdd->prepare($sql2);
$requete2->execute();


?>
<!-- Affiche -->
<div class="bg3">
 <div class="Harry">
 <img src="<?php echo $affiche["image_film"];?>">
  </div>
<!-- acteurs -->
<div class="container">
<?php 
while ($affiche2 = $requete2->fetch())
{ 
  ?>
<div class="card card0">
    <div class="border">
    <img src="<?php echo $affiche2["img_equipe"];?>">
      <h2><?php echo $affiche2["nom_equipe"]; ?></h2>   
    </div>
  </div>

<?php
}
?>



</div>
<!-- fin acteur -->
<!-- synopsi-->
<div class="titre">Résumer</div>
<div class="text">
<?php echo $affiche["sinopsy_film"];?>
</div>
<!--  fin synopsi-->

<!-- trailer-->
<div class="tv">
  <div class="video">
    </div>
  <iframe class="yt-video" width="900" height="600" src="<?php echo $affiche["trailer_film"];?>" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
</div>







 <!--footer -->
 <div class="footer1">
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
 </div>
 <!--fin footer -->
<script src="assets/js/cine.js"></script>
</body>
</html>