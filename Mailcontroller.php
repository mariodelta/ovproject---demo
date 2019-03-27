<?php

include('Functioncontroller.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function resetPasswordmail($email, $hash, $naam)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mariodelta1809@gmail.com';
        $mail->Password = 'bylvoupsdyujfroi';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('mariodelta1809@gmail.com', 'OV-Portaal');
        $mail->addAddress($email, $naam);

        $mail->isHTML(true);
        $mail->Subject = 'OV Portaal - Wachtwoord Vergeten';
        $mail->Body    = 'Beste &nbsp;'. $naam.' <br>

        <br>

        U heeft aangegeven u wachtwoord te zijn vergeten. <br>
        Geen probleem, hieronder vind u een link waarmee u uw wachtwoord kunt herstellen. <br>

        <hr>
        <a href="http://localhost/OVProjectv1/Reset_password.php?email=' . $email. '&hash=' .$hash.'">Klik hier om uw wachtwoord te wijzigen</a>';
        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

?>