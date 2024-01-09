<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the reset token from the URL
    $resetToken = $_GET['token'];

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

    // Check if the reset token exists and is still valid
    $query = "SELECT * FROM users WHERE reset_token = '$resetToken' AND reset_token_expires_at > NOW()";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Token is valid, allow the user to reset their password
        $_SESSION['reset_email'] = $user['email']; // Store the email in the session for use in the form

        // Display the password reset form
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Password Reset</title>
        </head>
        <body>
            <h2>Reset Your Password</h2>
            <form action="reset_password_process.php" method="post">
                <label for="password">New Password:</label>
                <input type="password" name="password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" required>

                <button type="submit">Reset Password</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Invalid or expired token.";
    }

    // Close the connection
    mysqli_close($conn);
}
?>
