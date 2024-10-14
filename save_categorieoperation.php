<?php
include("connexion.php");
if(isset($_POST['enregistrer'])){
    try{
        if($_POST['nom_categorieoperation']!=""){
            $req=$con->prepare("INSERT INTO categorieoperation(nom_categorieoperation) VALUES (?)");
            $req->execute(array($_POST['nom_categorieoperation']));
            echo '<script>alert("Enregistrement Avec succès du categorie")</script>';
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
