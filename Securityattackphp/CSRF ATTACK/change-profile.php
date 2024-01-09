<?php

session_start();

include('connection.php');

  if(empty($_SESSION['token']))
  {
		 $_SESSION['token'] = bin2hex(random_bytes(35));
 }

 $token=$_SESSION['token'];




 
if(isset($_POST['change']))
{
 if(isset($_POST['token']) and $_POST['token']==$_SESSION['token'])
 {
$uid=$_SESSION['userid'];

	$email=$_POST['email'];
	
	$sql="update user set uname='".$email."' where id=$uid";
	$result=mysqli_query($conn,$sql);
	
	if($result)
	{
		
		session_destroy();
		header('location:index.php');
	}
  }
 
  else 
  {
	  echo 'Access Denied';
	  exit();
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
  <h2>Change Profile</h2>
  <form method="post">
    
    <div class="mb-3">
      <label for="pwd">New Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email">
    </div>
	
 <input type="hidden" name="token" value="<?php echo $token;?>"> 
   
    <button type="submit" name="change" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
