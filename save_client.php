<?php
include ("connexion.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_FILES['photos']) && isset($_POST['nom']) && isset($_POST['postnom']) && isset($_POST['genre']) && isset($_POST['telephone']) && isset($_POST['mail']) && isset($_POST['ville'])) {
    if($_FILES['photos']['size'] <= 10000000) {
        $infofichier = pathinfo($_FILES['photos']['name']);
        $ext_upload = $infofichier['extension'];
        $ext_auto = array('jpg', 'jpeg', 'png');
        
        if(in_array($ext_upload, $ext_auto)) {
            if(move_uploaded_file($_FILES['photos']['tmp_name'], 'photos/'.basename($_FILES['photos']['name']))) {
                // Insertion dans la base de données
                $req1 = $con->prepare('INSERT INTO client(nom, postnom, genre, telephone, mail, photos, ville) VALUES (?, ?, ?, ?, ?, ?, ?)');
                $req1->execute(array($_POST['nom'], $_POST['postnom'], $_POST['genre'], $_POST['telephone'], $_POST['mail'], $_FILES['photos']['name'], $_POST['ville']));
                
                // Si l'insertion est réussie, envoyer l'email de confirmation avec PHPMailer
                $mail = new PHPMailer(true);
                try {
                    // Paramètres du serveur
                    $mail->isSMTP();                                            // Envoyer via SMTP
                    $mail->Host       = 'smtp.gmail.com';                       // Configurer le serveur SMTP (ex: Gmail)
                    $mail->SMTPAuth   = true;                                   // Activer l'authentification SMTP
                    $mail->Username   = 'kalumbichadrac@gmail.com';        // Adresse email SMTP (remplacez par la vôtre)
                    $mail->Password   = 'kalumbichadrac1234@gmail.com';                   // Mot de passe SMTP
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Activer le chiffrement TLS ou SSL
                    $mail->Port       = 465;                                    // Port TCP (465 pour SSL, 587 pour TLS)

                    // Destinataires
                    $mail->setFrom('kalumbichadrac@gmail.com', 'Votre Nom'); // Adresse de l'expéditeur
                    $mail->addAddress($_POST['mail']);                           // Adresse du destinataire (l'utilisateur)

                    // Contenu de l'email
                    $mail->isHTML(true);                                        // Format HTML
                    $mail->Subject = "Confirmation d'inscription";
                    $mail->Body    = "
                        <p>Bonjour {$_POST['nom']} {$_POST['postnom']},</p>
                        <p>Merci de vous être inscrit avec succès. Voici les détails de votre compte :</p>
                        <ul>
                            <li><b>Nom :</b> {$_POST['nom']}</li>
                            <li><b>Postnom :</b> {$_POST['postnom']}</li>
                            <li><b>Genre :</b> {$_POST['genre']}</li>
                            <li><b>Téléphone :</b> {$_POST['telephone']}</li>
                            <li><b>Ville :</b> {$_POST['ville']}</li>
                        </ul>
                        <p>Cordialement,<br>L'équipe de gestion de cash.</p>
                    ";
                    
                    // Envoi de l'email
                    $mail->send();
                    echo '<script>alert("Enregistrement avec succès et email envoyé.")</script>';
                } catch (Exception $e) {
                    echo "L'email n'a pas pu être envoyé. Erreur de PHPMailer: {$mail->ErrorInfo}";
                }
            }
        } else {
            echo '<script>alert("Erreur : extension de fichier invalide.")</script>';
        }
    } else {
        echo '<script>alert("Erreur : la taille du fichier est trop grande.")</script>';
    }
}
?>
