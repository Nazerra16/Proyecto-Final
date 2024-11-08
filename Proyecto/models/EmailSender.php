<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\DANG AVISO\Proyecto-Final\vendor\autoload.php';

class EmailSender {
    public static function sendEmail($to, $subject, $body) {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'sandbox.smtp.mailtrap.io'; // Cambia esto al servidor SMTP que uses
            $mail->SMTPAuth   = true;
            $mail->Username   = '52f45a596551df'; // poner email para enviar correos
            $mail->Password   = '8525ea78493d89'; // poner la contraseña
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       =  2525;

            //Recipients
            $mail->setFrom('DANGAviso@gmail.com', 'DANG Aviso');
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
