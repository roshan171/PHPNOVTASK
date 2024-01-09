<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define the directory where uploaded files will be stored
    $uploadDirectory = 'uploads/';

    // Ensure the directory exists, or create it
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Loop through each file in the $_FILES array
    foreach ($_FILES['files']['name'] as $key => $name) {
        // Check if file is selected
        if ($_FILES['files']['error'][$key] == 0 && !empty($name)) {
            $targetFilePath = $uploadDirectory . basename($name);

            // Move the file to the target directory
            if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFilePath)) {
                echo "File '{$name}' has been uploaded successfully.<br>";
            } else {
                echo "Error uploading file '{$name}'.<br>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple File Upload</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="files[]" multiple>
    <button type="submit">Upload Files</button>
</form>

</body>
</html>
