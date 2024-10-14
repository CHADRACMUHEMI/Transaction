<?php 
    include("connexion.php");
    if(isset($_GET['idclient'])){
        $sup=$con->prepare("DELETE FROM client WHERE idclient=?");
        $sup->execute(array($_GET['idclient']));
        echo '<script>alert("Suppression avec succès")</script>';
        header("location:vue_client.php");

    }
    

?>