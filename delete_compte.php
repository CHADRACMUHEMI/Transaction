<?php 
    include("connexion.php");
    if(isset($_GET['id_compte'])){
        $sup=$con->prepare("DELETE FROM compte WHERE id_compte=?");
        $sup->execute(array($_GET['id_compte']));

        echo '<script>alert("Suppression avec succès")</script>';
        header("location:vue_compte.php");

    }
    

?>