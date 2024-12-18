<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['first-name']);
    $lastName = htmlspecialchars($_POST['last-name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'niteowldigi@gmail.com';
        $mail->Password = 'mtqj hvyj layd bbza'; // Your app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('niteowldigi@gmail.com', $firstName);
        $mail->addAddress('niteowldigi@gmail.com', 'Nite Owl Digi'); // Ensure this is the correct address

        $mail->isHTML(true);
        $mail->Subject = "New inquiry from $firstName $lastName";
        $mail->Body = "First Name: $firstName<br>Last Name: $lastName<br>Phone: $phone<br>Email: $email<br>Message:<br>$message";
        $mail->AltBody = "First Name: $firstName\nLast Name: $lastName\nPhone: $phone\nEmail: $email\n\nMessage:\n$message";

        // Debugging
        $mail->SMTPDebug = 2; // Set to 0 once debugged
        $mail->Debugoutput = 'html';

        $mail->send();
        echo 'Message has been sent successfully.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "There was a problem with your submission. Please try again.";
}
