<?php 
    include("connexion.php");
    if(isset($_GET['id_operation'])){
        $sup=$con->prepare("DELETE FROM operation WHERE id_operation=?");
        $sup->execute(array($_GET['id_operation']));
        echo '<script>alert("Suppression avec succès")</script>';
        header("location:vue_operation.php");

    }
    

?>