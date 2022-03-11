<?php

//partie connexion//
$user = "root";
$pass = "";

try {
    $bdd = new PDO('mysql:host=localhost;dbname=cn_metro;charset=utf8', $user, $pass);
  
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// recherche info via requete sql
/*$sql = "SELECT * FROM film";
$requete = $bdd->prepare('$sql');
$requete->execute();

while ($row = $prepare->fetch() ) {

}*/

?>