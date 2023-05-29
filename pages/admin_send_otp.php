<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'philhealth89@gmail.com';                     //Set the SMTP server to send through
    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'philhealth89@gmail.com';                     //SMTP username
    $mail->Password   = 'nymsjliexxdysgyi';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('philhealth89@gmail.com', 'PhilHealth');
    $mail->addAddress('philhealth89@gmail.com', 'PhilHealth');     //Add a recipient
    $mail->addAddress('philhealth89@gmail.com'); 
    $mail->AddCC($email, $user);              //Name is optional

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML

    $bodyContent = "<!DOCTYPE html>";
    $bodyContent .= "<html>";
    $bodyContent .= "<head>";
    $bodyContent .= "<meta charset='utf-8'>";
    $bodyContent .= "</head>";
    $bodyContent .= "<body>";
    $bodyContent .= "<br>";
    $bodyContent .= "<p>We received a request to reset your password. Enter the following password reset code: <span style='color: red'><b> $OTP_code </b> </span> </p>";
    $bodyContent .= "<h4>For your protection, do not share this reset code with anyone</h4>";
    $bodyContent .= "</body>";
    $bodyContent .= "</html>";
    
    $mail->Subject = 'RESET CODE';
    $mail->Body    = $bodyContent;
    $mail->AltBody = "This is the plain text version of the email content";
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>