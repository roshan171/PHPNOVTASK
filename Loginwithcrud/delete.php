<?php
include "config.php";

$idd=$_GET['id'];
$sql = "DELETE FROM `crudddimg` WHERE `id` ='$idd' ;";
$result = mysqli_query($conn, $sql);
//$data=mysqli_fetch_array($result);
if($result){
         echo "<script type=\"text/javascript\">
              alert(\"Data Deleted Successfully\");
              window.location = \"index.php\"
              </script>";
    }
    else{
        die(mysqli_error($conn));
      }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    
</body>
</html>