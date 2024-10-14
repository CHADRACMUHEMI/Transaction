<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <title>Connexion</title>
</head>
<body>
    <div class="container ">
    <div class="text-white">
                <h2 class="text-white">SB to cash management</h2>
            </div>

            <div class="text-white">
                <h2 class="text-white">SB to cash management</h2>
            </div>
            
        <div class="col col-md-4 mx-11 shadow-lg justify content-center">
        <h2 class="text-primary text-center py-2"><span style="color: #149ddd;"><i class="fas fa-user-circle fa-1x"></i> Connexion </span></h2>
        <form action="login.php" method="post">
           
            <strong>
            <div class="text-center">
                <label class="form_label text-secondary" for="fonction">Fonction :</label>
                <input class="form-control" type="text" id="fonction" name="fonction" required>
            </div>
            <br>
            <div class="text-center">
                <label class="form_label text-secondary" for="mot_de_passe"><i class="fas fa-user-lock"></i> Mot de passe :</label>
                <input class="form-control" type="password" id="mot_de_passe" name="mot_de_passe" required>
            </div>
            <br>
            <div class="container py-2 text-center">
            <button class="btn text-white" style="background-color: #149ddd;whith:100px;" type="submit"><i class="fas fa-sign-out-alt"></i> Se connecter</button> <br>
            <a class="text-danger" href=""><i class="fas fa-eye"></i> Mot de passe oublié ?</a>
            </div>
            </strong>
            <div class="div py-4">

            </div>
        </form>
        </div>
    </div>
</body>
</html>

<?php
try {
    // Connexion à la base de données
    $con = new PDO("mysql:host=localhost;dbname=bdd_transaction", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            case 'Admin':
                setcookie("admin",serialize($utilisateur),time()+(365*24*60*60));

                header("Location: vue_client.php");
                exit;

            case 'Reception':
                setcookie("reception",serialize($utilisateur),time()+(365*24*60*60));
                header("Location: vue_clientn.php");
                exit;

            case 'Caisse':
                setcookie("caisse",serialize($utilisateur),time()+(365*24*60*60));
                header("Location: vue_operationn.php");
                exit;
            // Ajouter des cases supplémentaires pour chaque fonction si nécessaire
            default:
                header("Location: login.php");
                exit;
        }
    } else {
        // Afficher un message d'erreur si les informations sont incorrectes
        echo '<script>alert("Fonction ou mot de passe incorrect. Veuillez réessayer.")</script>';
    }
}
?>
