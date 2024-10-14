<?php
try {
    // Connexion à la base de données
    $con = new PDO("mysql:host=localhost;dbname=bdd_transaction", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "post") {
    $fonction = $_POST['fonction'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Requête pour vérifier les informations
    $query = $con->prepare("SELECT * FROM compteutilisateur WHERE fonction = :fonction AND mot_de_passe = :mot_de_passe");
    $query->bindParam(':fonction', $fonction);
    $query->bindParam(':mot_de_passe', $mot_de_passe);
    $query->execute();

    // Vérifier si une ligne correspond
    if ($query->rowCount() > 0) {
        // Récupérer l'utilisateur
        $utilisateur = $query->fetch(PDO::FETCH_ASSOC);

        // Redirection en fonction de la fonction
        switch ($utilisateur['fonction']) {
            case 'admi':
                header("Location: form_insc.php");
                exit;
            case 'caisse':
                header("Location: form_compte.php");
                exit;
            // Ajouter des cases supplémentaires pour chaque fonction si nécessaire
            default:
                header("Location: form_connexion.php");
                exit;
        }
    } else {
        // Afficher un message d'erreur si les informations sont incorrectes
        echo "Fonction ou mot de passe incorrect. Veuillez réessayer.";
    }
}
?>
