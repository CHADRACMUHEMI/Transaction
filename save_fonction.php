<?php

    // Préparer la requête SQL pour vérifier les informations
    $sql = "SELECT * FROM compteutilisateur WHERE  mot_de_passe = ?  AND fonction = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $fonction, $mot_de_passe);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérifier si une correspondance a été trouvée
    if ($result->num_rows > 0) {
        // Récupérer les informations de l'utilisateur
        $row = $result->fetch_assoc();

        // Rediriger l'utilisateur vers sa page en fonction de sa fonction
        switch ($fonction) {
            case 'admin':
                header("Location: form_categoriecompte.php");
                break;
            case 'Réception':
                header("Location: .php");
                break;
            // Ajoutez d'autres cas en fonction des rôles disponibles
            default:
                header("Location: connexion.php"); // Page d'accueil par défaut
                break;
        }
        exit;
    } else {
        echo "Fonction ou mot de passe incorrect. Veuillez réessayer.";
    }

    // Fermer la conexion
    $stmt->close();
    $con->close();

?>
