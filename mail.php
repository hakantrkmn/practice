<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                               // Enable verbose debug output
    $mail->isSMTP();
    $mail->SMTPKeepAlive = true;                                     // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "hakannturkmen@gmail.com";                 // SMTP username
    $mail->Password = 'hakan6161';                           // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->CharSet = "UTF-8";                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('hakannturkmen@gmail.com', 'site');
    $mail->addAddress($_GET['mail'], 'hakan');     // Add a recipient


    //Attachments
    $mail->addAttachment('dosya.txt');         // Add attachments


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'SİTEYE KOŞHELDİNİZ';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
