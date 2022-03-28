<?php

//partie connexion//
$user = "dbu952529";
$pass = "Pw4jmB64";

try {
    $bdd = new PDO('mysql:host=db5006773111.hosting-data.io;dbname=dbs5603731;charset=utf8', $user, $pass);
  
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>