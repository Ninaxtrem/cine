<?php 
include "traitement.php";


$nom = $_POST['nom'];
$mail = $_POST['email'];
$mdp = $_POST['mdp'];

if($mdp==$mdp){
    
  

$sql = "SELECT * FROM cn_utilisateur WHERE nom_utilisateur = :nom_utilisateur";
$requete= $bdd->prepare($sql);
$requete->execute(array(
    ":nom_utilisateur" =>$nom));
 $count = $requete->rowCount();
 if($count== 0){



    $sql = "SELECT * FROM cn_utilisateur WHERE mail_utilisateur = :mail_utilisateur";
    $requete= $bdd->prepare($sql);
    $requete->execute(array(
        ':mail_utilisateur'=>$mail
    ));
    $testmail = 0;

    while ($resultat=$requete->fetch()){
    
        if($mail == $resultat['mail_utilisateur']){
            $test=1;
           
    if( $testmail ==0){


$sql = "INSERT INTO  cn_utilisateur (nom_utilisateur, mail_utilisateur, mot_de_pass_utilisateur) VALUES (:nom_utilisateur, :mail_utilisateur, :mot_de_pass_utilisateur)";
$requete= $bdd->prepare($sql);
$requete->execute(array(
    ':nom_utilisateur'=> $nom,
    ':mail_utilisateur'=> $mail,
    ':mot_de_pass_utilisateur'=> $mdp,
));



 header("location: connect.php?message=sucess");
}
}else{
    header("location: inscription.php?message-error3");
}
}
}else{
header("location: inscription.php?message-error2");
}
}else {
 header("location: inscription.php?message-error");
}
?>