<?php 
    include("connexion.php");
    if(isset($_GET['id_categoriecompte'])){
        $sup=$con->prepare("DELETE FROM categoriecompte WHERE id_categoriecompte=?");
        $sup->execute(array($_GET['id_categoriecompte']));

        echo '<script>alert("Suppression avec succès")</script>';
        header("location:vue_categoriecompte.php");

    }
    

?>