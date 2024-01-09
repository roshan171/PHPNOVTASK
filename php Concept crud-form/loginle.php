<?php

if(isset($_POST['submit'])){
  session_start();
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $con=mysqli_connect("localhost", "root", "", "lemonmode_trackorder");
  // if($con){ echo "1"; } else{ echo "2";}
  $chk=mysqli_fetch_array(mysqli_query($con,"select count(*) as cn from `register` where `username`='$user' and `password`='$pass'"));
  print_r($chk);
  //$user="koushaljs@gmail.com";
  //$pass='Kous@3636';
  //  if($username==$user && $password == $pass){
  if($chk['cn']>0){
      // echo $password . $pass;
      
      $_SESSION['username'] = $user;
      $_SESSION['loggedIn'] = true;
      echo "<script>window.location ='index.php';</script>";
      //header("Location: https://lemonmode.com/admin/index.php");
      
    
  }else{
    echo "Username and password wrong....";
  }
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="stylelemon.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  </head>
  <body>
    <div class="login">
      <h1>Login</h1>
      <form action="login.php" method="post">
        <label for="username">
          <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>
        <label for="password">
          <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" id="submit" name="submit" value="Login">
        <div class="form-link">
        <span>Don't have an account?  <a href="registerlemon.php" class="link login-link">Sign Up</a></span>
        </div>
      </form>
    </div>
  </body>
</html>