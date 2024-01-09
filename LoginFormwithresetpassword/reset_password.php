<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection (replace with your database credentials)
    $host = "localhost";
    $db = "resetpassword";
    $user = "root";
    $password = "";

    // Establish a connection
    $conn = mysqli_connect($host, $user, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Handle password reset logic
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if the email exists in the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Generate a unique reset token
        $resetToken = bin2hex(random_bytes(32));

        // Hash the token before storing it in the database
        $hashedToken = password_hash($resetToken, PASSWORD_DEFAULT);

        // Store the hashed reset token in the database along with its expiration time
        $updateQuery = "UPDATE users SET reset_token = '$hashedToken', reset_token_expires_at = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = '$email'";
        mysqli_query($conn, $updateQuery);

        // Send an email with a link containing the reset token to the user
        $resetLink = "http://yourwebsite.com/reset_password_confirm.php?token=$resetToken";
        mail($email, "Password Reset", "Click the following link to reset your password: $resetLink");

        echo "Password reset instructions sent to your email.";
    } else {
        echo "Email not found.";
    }

    // Close the connection
    mysqli_close($conn);
}
?>
