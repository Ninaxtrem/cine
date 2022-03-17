<?php 
 include "traitement.php";


 $nom = $_POST['nom'];
 $mail = $_POST['email'];
 $mdp = $_POST['mdp'];



$mdp = password_hash ($mdp, PASSWORD_DEFAULT);
  

$sql = "SELECT * FROM cn_utilisateur WHERE nom_utilisateur = :nom_utilisateur";
$requete= $bdd->prepare($sql);
$requete->execute(array(
":nom_utilisateur"=> $nom));

$count = $requete->rowCount();

if($count == 0){

     $sql1 = "SELECT * FROM cn_utilisateur WHERE mail_utilisateur = :mail_utilisateur";
     $requete1= $bdd->prepare($sql1);
     $requete1->execute(array(
         ':mail_utilisateur'=>$mail
     ));

     $resultat1 =$requete1->fetch();
     
     $countmail = $requete->rowCount();
    
    if($countmail == 0){
         
         if($mail !== $resultat1['mail_utilisateur']){
                
                            $sql = "INSERT INTO  cn_utilisateur (nom_utilisateur, mail_utilisateur, mot_de_pass_utilisateur) VALUES (:nom_utilisateur, :mail_utilisateur, :mot_de_pass_utilisateur)";
                            $requete= $bdd->prepare($sql);
                            $requete->execute(array(
                                ':nom_utilisateur'=> $nom,
                                ':mail_utilisateur'=> $mail,
                                ':mot_de_pass_utilisateur'=> $mdp,
                            ));
                         
                        
                        
                        
                                 header("location: connect.php?message=sucess");
 }else{
    header("location:inscription.php?message=error");
 }

}else{
    header("location:inscription.php?message=error2");
}

}else{ 
    header("location: inscription.php?message=error3");
}
?>
