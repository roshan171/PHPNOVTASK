<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];

    if($password==$confirm_password){
$s="INSERT INTO `users` (`username`, `password`,`confirm_password`) VALUES ('$username','$password','$confirm_password')";
// echo $s; 
$sql=mysqli_query($conn,$s);
 if($sql){
        echo "<script>alert('Registration Successfully');
        window.location.href ='login.php';</script>";
    }

}
else{
       echo "<script>alert('Confirm Right Password')";
}
}
 
   




?>





<!doctype html>
<html lang="en"
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login form in HTML and CSS</title>
<link rel="stylesheet" href="style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
        <h1>Register</h1>
        <div class="input-box">
            <input type="text" placeholder="Username" name="username" required>
            <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
            <input type="text" placeholder="password" name="password" required>
            <i class='bx bxs-lock-alt'></i>
    </div>
    <dive class="input-box">
        <input type="text" placeholder="confirm_password" name="confirm_password" required>
        <i class='bx bxs-lock-alt'></i>
    </dive>
  
    <dive class="remember-forget"><br>
    

</dive><br>
<button type="submit" class="btn" name="submit">Register</button>
<div class="register-link">
<a href="#">Forget password?</a></div>
<div class="register-link">
    <p>Alerdy have an account? <a href="login.php">Login</a></p>
</div>
</form>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>