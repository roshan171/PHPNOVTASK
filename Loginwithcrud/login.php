<?php
include 'config.php';

if(isset($_POST['submit'])){
    session_start();
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $chk=mysqli_fetch_array(mysqli_query($conn,"select count(*) as cn from `users` where `username`='$user' and `password`='$pass'"));
    // print_r($chk);
  
    //  if($username==$user && $password == $pass){
    if($chk['cn']>0){
        // echo $password . $pass;
        
        $_SESSION['username'] = $user;
        $_SESSION['loggedIn'] = true;
        echo "<script>window.location ='index.php';</script>";
        //header("Location: https://lemonmode.com/admin/index.php");
        
      
    }else{
      echo "<script>alert('Username And Password Invalid..');</script>";
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
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" placeholder="Username" name="username" required>
            <i class='bx bxs-user'></i>
    </div>
    <dive class="input-box">
        <input type="password" placeholder="Password" name="password" required>
        <i class='bx bxs-lock-alt'></i>
    </dive>
    <dive class="remember-forget"><br>
     

</dive><br>
<button type="submit" class="btn" name="submit">Login</button>
<div class="register-link">
<a href="#">Forget password?</a></div>
<div class="register-link">
    <p>Don't have an account? <a href="register.php">Register</a></p>
</div>
</form>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>