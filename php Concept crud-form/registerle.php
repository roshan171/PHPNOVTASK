<?php
 $conn=mysqli_connect("localhost", "root", "", "lemonmode_trackorder");

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    if($password==$confirm_password){
$s="INSERT INTO `register` (`username`, `password`,`confirm_password`) VALUES ('$username','$password','$confirm_password')";
// echo $s; 
$sql=mysqli_query($conn,$s);
 if($sql){
        echo "<script>window.location.href ='localhost/lemonmode_project/lemonmode/seller/login.php';</script>";
    }

}
else{
       echo "<script>alert('Confirm Right Password')";
}
}
?>


 <html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link href="stylelemon.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  </head>
  <body>
    <div class="login">
      <h1>Register</h1>
      <form action="" method="post">
        <label for="Name">
          <i class="fas fa-user"></i>
        </label>
        <input type="text" name="name" placeholder="name" id="name" required>
        <label for="username">
          <i class="fas fa-user"></i>
        </label>
        <input type="email" name="username" placeholder="Username" id="username" required>
        <label for="password">
          <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <!-- <input type="submit" id="submit" name="submit" value="Login"> -->
         <label for="password">
          <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="confirm_password" placeholder="confirm_password" id="password" required>
        <input type="submit" id="submit" name="submit" value="Register"> 
        <div class="form-link">
        <span>Already have an account? <a href="loginlemon.php" class="link login-link">Login</a></span>
        </div>
    </div>
      </form>
  
  </body>
</html>
