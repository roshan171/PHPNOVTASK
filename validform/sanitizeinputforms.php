<?php
// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

// Initialize variables to store form data and error messages
$name = $email = $message = '';
$emailError = '';
$nameError = '';
$messageError = '';


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate name (allow only alphabetical characters)
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $name = preg_replace("/[^a-zA-Z]/", "", $name); // Remove non-alphabetic characters

    // Sanitize and validate email
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }

    // Sanitize and validate message
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Check if name and message are not empty after filtering
    if (empty($name) || empty($message)) {
        echo "Name and Message are required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanitized Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        span.error {
            color: red;
            font-size: 14px;
        }

        .submitted-data {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div>
    <h2>Contact Us</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" >
        <?php if (!empty($nameError)) { echo "<span class='error'>$nameError</span>"; } ?>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" >
        <?php if (!empty($emailError)) { echo "<span class='error'>$emailError</span>"; } ?>

        <label for="message">Message:</label>
        <textarea name="message" rows="4" ><?php echo $message; ?></textarea>
        <?php if (!empty($messageError)) { echo "<span class='error'>$messageError</span>"; } ?>

        <button type="submit">Submit</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($emailError) && !empty($name) && !empty($message)): ?>
        <div class="submitted-data">
            <h2>Submitted Data:</h2>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Message:</strong> <?php echo $message; ?></p>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
