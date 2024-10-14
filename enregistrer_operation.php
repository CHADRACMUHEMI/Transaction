<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Saisie d'Opération</title>
</head>
<body>
    <h1>Enregistrement d'une Opération</h1>
    <form action="enregistrer_operation.php" method="post">
        <label for="idclient">ID Client :</label>
        <input type="number" id="idclient" name="idclient" required><br><br>
        
        <label for="idcompte">ID Compte :</label>
        <input type="number" id="id_compte" name="id_compte" required><br><br>
        
        <label for="idcategorieoperation">ID Catégorie Opération :</label>
        <input type="number" id="id_categorieoperation" name="id_categorieoperation" required><br><br>
        
        <label for="montant">Montant :</label>
        <input type="number" id="montant" name="montant" required><br><br>
        
        <button type="submit">Enregistrer l'Opération</button>
    </form>
    <?php
try {
    $con = new PDO("mysql:host=localhost;dbname=bdd_transaction", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des données du formulaire
$idclient = $_POST['idclient'];
$id_compte = $_POST['id_compte'];
$id_categorieoperation = $_POST['id_categorieoperation'];
$montant = $_POST['montant'];

// Insérer l'opération dans la table 'operation'
$sql = "INSERT INTO operation (id_compte, id_categorieoperation, montant) VALUES (:id_compte, :id_categorieoperation, :montant)";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id_compte', $id_compte);
$stmt->bindParam(':id_categorieoperation', $id_categorieoperation);
$stmt->bindParam(':montant', $montant);

if ($stmt->execute()) {
    // Récupérer les informations du client
    $sql_client = "SELECT nom, Gmail FROM client WHERE idclient = :idclient";
    $stmt_client = $con->prepare($sql_client);
    $stmt_client->bindParam(':idclient', $idclient);
    $stmt_client->execute();
    $client = $stmt_client->fetch(PDO::FETCH_ASSOC);

    // Récupérer le nom de la catégorie d'opération
    $sql_categorie = "SELECT nom_categorieoperation FROM categorieoperation WHERE id_categorieoperation = :id_categorieoperation";
    $stmt_categorie = $con->prepare($sql_categorie);
    $stmt_categorie->bindParam(':id_categorieoperation', $id_categorieoperation);
    $stmt_categorie->execute();
    $categorie = $stmt_categorie->fetch(PDO::FETCH_ASSOC);

    if ($client && $categorie) {
        // Préparer et envoyer l'email
        $to = $client['Gmail'];
        $subject = "Notification d'Opération";
        $message = $client['nom'] . " a effectué une opération de type " . $categorie['nom_categorieoperation'] . " d'un montant de " . $montant . " EUR.";
        $headers = "From: no-reply@votreentreprise.com\r\n";
        
        if (mail($to, $subject, $message, $headers)) {
            echo "Opération enregistrée et email envoyé avec succès.";
        } else {
            echo "Opération enregistrée, mais l'envoi de l'email a échoué.";
        }
    } else {
        echo "Erreur lors de la récupération des informations client ou catégorie.";
    }
} else {
    echo "Erreur lors de l'enregistrement de l'opération.";
}
?>

</body>
</html>
