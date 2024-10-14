<?php
include ("connexion.php");

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
                
                // Si l'insertion est réussie, envoyer l'email de confirmation
                $to = $_POST['mail'];
                $subject = "Confirmation d'inscription";
                $message = "Bonjour " . $_POST['nom'] . " " . $_POST['postnom'] . ",\n\n";
                $message .= "Merci de vous être inscrit avec succès. Voici les détails de votre compte :\n";
                $message .= "Nom : " . $_POST['nom'] . "\n";
                $message .= "Poste nom : " . $_POST['postnom'] . "\n";
                $message .= "Genre : " . $_POST['genre'] . "\n";
                $message .= "Téléphone : " . $_POST['telephone'] . "\n";
                $message .= "Ville : " . $_POST['ville'] . "\n\n";
                $message .= "Cordialement,\nL'équipe de gestion de cash.";

                $headers = 'From: kalumbichadrac@gmail.com' . "\r\n";
                           'Reply-To:'.$to.' . "\r\n"';
                           'X-Mailer: PHP/' . phpversion();
                           

                // Envoi de l'email
                if(mail($to, $subject, $message, $headers)) {
                    echo '<script>alert("Enregistrement avec succès et email envoyé.")</script>';
                } else {
                    echo '<script>alert("Enregistrement avec succès, mais l\'email n\'a pas pu être envoyé.")</script>';
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

<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kalumbichadrac@gmail.com';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Test');
    $mail->addAddress('mutsungajames@gmail.com');     //Add a recipient

   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
