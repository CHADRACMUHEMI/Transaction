<?php
include("connexion.php");
if(isset($_POST['enregistrer'])){
    try{
        if($_POST['fonction']!=""){
            $req=$con->prepare("INSERT INTO compteapplication(fonction) VALUES (?)");
            $req->execute(array($_POST['fonction']));
            echo '<script>alert("Enregistrement Avec succès")</script>';
        }
        else{
            echo '<script>
            alert("Veuillez remplir les formulaires necessaires")
            </script>';
        }
    }
    catch(exception $e){
        die("Erreur de connexion due aux donnees fournies pour connexion au fournisseur".$e->getMessage());
    }
}
?>
