<?php
session_start();
include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Hello, <?php echo $_SESSION['username']; ?></h2>
  
  <a href="change-profile.php">change profile</a>
 
 
 <a href="logout.php">logout</a>
 
</div>

</body>
</html>
