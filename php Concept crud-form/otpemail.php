<?php
session_start();

// Step 1: Set up the email configuration using PHPMailer or any other email library

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Step 2: Generate a random OTP
$otp = mt_rand(100000, 999999);

// Step 3: Store the generated OTP in a session variable
$_SESSION['otp'] = $otp;

// Step 4: Compose the email message and send it to the user
$email = 'recipient@example.com'; // Replace with the recipient's email address

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.example.com'; // Replace with your SMTP server address
$mail->SMTPAuth = true;
$mail->Username = 'your_username'; // Replace with your SMTP username
$mail->Password = 'your_password'; // Replace with your SMTP password
$mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl' depending on your server configuration
$mail->Port = 587; // Replace with the appropriate SMTP port

$mail->setFrom('yourname@example.com', 'Your Name'); // Replace with the sender's email address and name
$mail->addAddress($email); // Set the recipient's email address

$mail->Subject = 'OTP Verification';
$mail->Body = 'Your OTP is: ' . $otp;

try {
    $mail->send();
    echo 'Email sent successfully.';
} catch (Exception $e) {
    echo 'An error occurred while sending the email: ' . $mail->ErrorInfo;
}
?>
