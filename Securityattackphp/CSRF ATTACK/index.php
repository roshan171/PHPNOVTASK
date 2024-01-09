<?php

session_start();

include('connection.php');

if(isset($_POST['submit']))
{
	$username=$_POST['email'];
	$pwd=$_POST['pswd'];
	
	$sql="select * from user where uname='".$username."' and upwd='".$pwd."'";
	$result=mysqli_query($conn,$sql);
	$data=mysqli_fetch_array($result);
	
	if(count($data)>0)
	{
		$_SESSION['userid']=$data['id'];
	
		$_SESSION['username']=$data['uname'];
		header('location:profile.php');
	}
}


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
  <h2>Login form</h2>
  <form method="post" autocomplete="off">
    <div class="mb-3 mt-3">
      <label for="email">username:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
   
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
