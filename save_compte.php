<?php
include("connexion.php");

if(isset($_POST['enregistrer'])){
    $idClient = $_POST["idclient"];
    $idCategorie = $_POST["nom_categoriecompte"];
    try{
        $search = $con->query("SELECT * FROM `compte` INNER JOIN client ON client.idclient = compte.idclient INNER JOIN categoriecompte ON categoriecompte.id_categoriecompte = compte.id_categoriecompte WHERE compte.id_categoriecompte = '".$idCategorie."' AND client.idclient ='".$idClient."' ");
        if($search->rowCount()>0)
        { ?>
            <script>
                alert("ce compte existe deja")
                window.location.href="form_compte.php"
            </script>
<?php }
        else{
            $req=$con->prepare("INSERT INTO `compte`(`idclient`, `id_categoriecompte`) VALUES (?,?)");
        $req->execute(array($_POST['idclient'],$_POST['nom_categoriecompte']));
        echo '<script>alert("Enregistrement Avec succès du compte");window.location.href="form_compte.php"</script>';
        }
        
    }catch(exception $e){
        die("Erreur de connexion due aux donnees fournies pour connexion au fournisseur".$e->getMessage());
    }
}
?>
