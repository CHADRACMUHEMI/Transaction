<?php
include("connexion.php");
if(isset($_POST['enregistrer'])){
    try{
        // Vérifiez que tous les champs sont remplis
        if($_POST['id_categorieoperation']!="" && $_POST['id_compteuser']!="" && $_POST['id_compte']!="" && $_POST['montant']!="") {

            // Si c'est un virement (ID virement par exemple 3)
            if ($_POST['id_categorieoperation'] == 3 && $_POST['id_comptereceveur'] != "") {
                
                // 1ère opération : Retrait du compte du client émetteur
                $req = $con->prepare("INSERT INTO operation(id_categorieoperation,id_compteuser,id_compte,montant) VALUES (?, ?, ?, ?)");
                $req->execute(array(2, $_POST['id_compteuser'], $_POST['id_compte'], $_POST['montant'])); // 2 = ID pour retrait
                
                // 2ème opération : Dépôt sur le compte du client receveur
                $req = $con->prepare("INSERT INTO operation(id_categorieoperation,id_compteuser,id_compte,montant) VALUES (?, ?, ?, ?)");
                $req->execute(array(1, $_POST['id_compteuser'], $_POST['id_comptereceveur'], $_POST['montant'])); // 1 = ID pour dépôt

                echo '<script>alert("Virement enregistré avec succès")</script>';
            
            } else {
                // Pour les autres types d'opérations (non virement)
                $req = $con->prepare("INSERT INTO operation(id_categorieoperation,id_compteuser,id_compte,montant) VALUES (?, ?, ?, ?)");
                $req->execute(array($_POST['id_categorieoperation'], $_POST['id_compteuser'], $_POST['id_compte'], $_POST['montant']));
                
                echo '<script>alert("Opération enregistrée avec succès")</script>';
            }

        } else {
            echo '<script>alert("Veuillez remplir les formulaires nécessaires")</script>';
        }
    }
    catch(Exception $e){
        die("Erreur : ".$e->getMessage());
    }
}
?>
