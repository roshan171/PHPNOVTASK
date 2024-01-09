<?php
session_start();

// Include your database connection file
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form is submitted for email OTP verification
    if (isset($_POST['request_otp'])) {
        requestOTP($conn);
    } elseif (isset($_POST['verify_otp'])) {
        verifyOTP($conn);
    }
}

function generateOTP()
{
    // Generate a 6-digit random OTP
    return str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
}

function sendOTP($email, $otp)
{
    // Implement your email sending logic here
    // You can use PHPMailer or another email library
    // In this example, we are using the simple mail function
    $subject = 'OTP Verification';
    $message = "Your OTP for email verification is: $otp";
    $headers = 'From: roshandhawde143@gmail.com';

    mail($email, $subject, $message, $headers);
}

function requestOTP($conn)
{
    $email = $_POST['email'];
    $otp = generateOTP();

    // Store email and OTP in the database
    $stmt = $conn->prepare("INSERT INTO users (email, otp, otp_expiry) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 5 MINUTE))");
    $stmt->bind_param('ss', $email, $otp);
    $stmt->execute();

    // Send OTP to the user's email
    sendOTP($email, $otp);

    echo 'OTP has been sent to your email.';
}

function verifyOTP($conn)
{
    $email = $_POST['email'];
    $user_otp = $_POST['otp'];

    // Validate the user-entered OTP
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND otp = ? AND otp_expiry > NOW()");
    $stmt->bind_param('ss', $email, $user_otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // OTP is valid
        echo 'OTP verified successfully!';
        // You can update the user's status in the database or perform other actions

        // Clear the used OTP from the database
        $stmt = $conn->prepare("UPDATE users SET otp = NULL, otp_expiry = NULL WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
    } else {
        // Invalid OTP
        echo 'Invalid OTP. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email OTP Verification</title>
</head>

<body>
    <h2>Email OTP Verification</h2>

    <!-- Form for requesting OTP -->
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit" name="request_otp">Request OTP</button>
    </form>
    <br>
    <!-- Form for verifying OTP -->
    <form action="" method="post">
        <label for="otp">Enter OTP:</label>
        <input type="text" name="otp" pattern="\d{6}" required>
        <button type="submit" name="verify_otp">Verify OTP</button>
    </form>
</body>

</html>
