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

    // Retrieve email from the session (set during reset_password_confirm.php)
    $email = $_SESSION['reset_email'];

    // Clear the stored email from the session
    unset($_SESSION['reset_email']);

    // Get the new password and its confirmation from the form
    $newPassword = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Validate the new password
    if ($newPassword !== $confirmPassword) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Update the user's password in the database
    $updateQuery = "UPDATE users SET password = '$hashedPassword', reset_token = NULL, reset_token_expires_at = NULL WHERE email = '$email'";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo "Password reset successfully!";
    } else {
        echo "Error resetting password: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
} else {
    // Redirect to the reset_password_confirm.php page if accessed directly without a POST request
    header("Location: reset_password_confirm.php");
    exit();
}
?>
