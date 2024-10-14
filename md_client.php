<?php 
    include("connexion.php");
    if(isset($_POST['modifier'])){
        $req=$con->prepare("UPDATE client SET nom=?,postnom=?,genre=?,telephone=?,mail=?,photos=?,ville=? WHERE idclient=?");
        $req->execute(array($_POST['nom'],$_POST['postnom'],$_POST['genre'],$_POST['telephone'],$_POST['mail'],$_POST['photos'],$_POST['ville'],$_GET['idclient']));
            ?>

                <script>
                    alert('modification avec succes');
                </script>
                        
                <?php
                header("location:vue_client.php");
             
    }
    
    ?>