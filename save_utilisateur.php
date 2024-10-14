<?php
include("connexion.php");
if(isset($_POST['enregistrer'])){
    $req=$con->prepare("INSERT INTO compteutilisateur(pseudo,mot_de_passe,fonction) VALUES (?,?,?)");
    $req->execute(array($_POST['nom'],$_POST['mot_de_passe'],$_POST['fonction']));
    
    echo '<script>alert("Enregistrement Avec succès d utilisateur")</script>';
}

?>