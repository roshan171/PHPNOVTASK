<?php 

session_start();
$username=$_SESSION['username'];

if(!isset($username)){
    echo "<script>alert('You Have To Login First..');
    window.location.href ='login.php';</script>";
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>

<h2>Welcome:<?php echo $username;?></h2>
<a href="logout.php"><button class="btn btn-danger">Logout</button></a>
    



<div class="container mt-5">
    <h2 class="text-center">User Data</h2>
    <a href="insert.php"><button class="btn btn-primary m-4">Add Data</button></a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
<?php 
include 'config.php';
 $sql = "SELECT * FROM `crudddimg` ";
 $result = mysqli_query($conn, $sql);
 $i=1;

?>

<?php 

while($data = mysqli_fetch_assoc($result)){
    ?>
<tr id=<?php echo $data['id'];?>>
   	<td> <?php echo $i++; ?></td>
   <td> <?php echo $data["name"]; ?></td>
    <td> <?php echo $data["email"]; ?></td>
    <td> <?php echo $data["gender"]; ?></td>
    <td> <?php echo $data["status"]; ?></td>
    <td width="80"><img src="images/<?php echo $data['image']; ?>" width="50" height="50"></td>
    	

    <td class="actions ">
     <a href="update.php?id=<?php echo $data['id']; ?>"  class=" btn btn-success editbtn"><i class="fas fa-edit"></i></a>

      <a href="delete.php?id=<?php echo $data['id'];?>" class="btn btn-danger trash m-1"><i class="fas fa-trash" ></i></a>

       <!-- <a href="" data-toggle="modal" data-target="#viewmodal" class=" btn btn-secondary viewbtn" name="viewbtn"><i class="fas fa-eye"></i> </a> -->
                </td>

            <?php  }
            ?>
    </tr>



 
  </tbody>
</table>
</div>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>