<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
?>

<?php
function sendMail($email)
{
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                             // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'raihantalukder96@gmail.com';                 // SMTP username
        $mail->Password = 'whoami19948roo';                        // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('djprince3g@gmail.com', 'Mailer');
        $mail->addAddress($email);     // Add a recipient
//        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('raihantalukder96@gmail.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        //Attachments
        //Content
        $mail->isHTML(true);                               // Set email format to HTML
        $mail->Subject = 'Account Confirmation';
        $mail->Body = 'Your Registration is verified by the admin! <b> You are in!</b>';
//        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}