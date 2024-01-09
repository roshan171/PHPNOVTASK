<?php   

include "constant.php";


// Insert Query 

if (isset($_POST['submit'])) {

	$name= $_POST['name'];
	$title= $_POST['title'];
	$description= $_POST['description'];
	$gender= $_POST['gender'];
  $checkbox=$_POST['technology'];  
  $chk1=implode(",", $checkbox);  

$sql=mysqli_query($conn,"INSERT INTO `impcrud`(`name`, `title`, `description`, `gender`, `technology`) VALUES ('$name','$title','$description','$gender','$chk1')");  
if ($sql) 
   {  
      echo'<script>alert("Inserted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }


}



// Update Query 

if (isset($_POST['update'])) {

  $name= $_POST['name'];
  $title= $_POST['title'];
  $description= $_POST['description'];
  $gender= $_POST['gender'];
  $checkbox=$_POST['technology'];  
  $chk1=explode(",", $checkbox);  

$sql=mysqli_query($conn,"UPDATE `impcrud` SET `id`='$id',`name`='$name',`title`='$title',`description`='$description',`gender`='$gender',`technology`='$chk1' WHERE `id` ='$id'");  
if ($sql) 
   {  
      echo "<script type=\"text/javascript\">
              alert(\"Data Updated Successfully\");
              window.location = \"index.php\"
              </script>"; 
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }


}





//Delete Query


if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $sql = "DELETE FROM impcrud WHERE id='$id'";
  $result=$conn->query($sql);

  if ($result) {
    echo "<script type=\"text/javascript\">
              alert(\"Data deleted Successfully\");
              window.location = \"index.php\"
              </script>"; 
 
  }
  else{
    die(mysqli_error($conn));
  }
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</head>
<body>


<div class="m-3">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodal">
 Add Form
</button>
</div>



<!-- Modal -->
<div class="modal fade" id="addmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
<form method="post" enctype="multipart/form-data" class="container">

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control"  name="name" id="inputEmail4" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Title</label>
      <input type="text" class="form-control" name="title" id="inputPassword4">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Description</label>
    <textarea type="text" class="form-control" name="description" id="inputAddress" ></textarea>
  </div>
  <div class="form-group">

  </div>

     <div class="form-row">
     <div class="form-check col-md-4">
     	 <label for="inputAddress">Gender</label>
	Male<input value="Male"  type="radio" name="gender"/>
Female<input value="Female" type="radio" name="gender"/>
	</div>


<div class="form-check col-md-6">
	 <label for="inputAddress">Hobbies</label>
 Programming: <input  type="checkbox" name="technology[]" id="blankCheckbox" value="programming"/>
 Coding: <input  type="checkbox" name="technology[]" id="blankCheckbox" value="coding" />
 Editing: <input type="checkbox" name="technology[]" id="blankCheckbox" value="editing" />
</div>

  </div>
<div>
  <button type="submit" name="submit" class="btn btn-primary">Save</button>
</div>
</form>
      </div>
     
    </div>
  </div>
</div>





<!-- edit Modal -->
<div class="modal fade" id="editmodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
    <form method="post" enctype="multipart/form-data" class="container">
         <input type="hidden" name="id"  value="<?php echo $id ?>">

               <?php
               include "constant.php";
                $sql = "SELECT * FROM impcrud ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
              
               
                ?>
     
  <div class="form-row">
    <div class="form-group col-md-6">

      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control"  name="name" id="inputEmail4" value="<?php echo $row['name'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Title</label>
      <input type="text" class="form-control" name="title" id="inputPassword4" value="<?php echo $row['title'];?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Description</label>
    <textarea type="text" class="form-control" name="description" id="inputAddress" ><?php echo $row['description'];?></textarea>
  </div>
  <div class="form-group">

  </div>

     <div class="form-row">
     <div class="form-check col-md-4">
     
    <label>Gender:</label>
    <input type="radio"
				       name="gender"
				       value="Male"
				       <?php echo ($row['gender'] == "Male")?"checked":"" ?>>
				<label>Male</label>
   <input type="radio"
				       name="gender"
				       value="Male"
				       <?php echo ($row['gender'] == "Female")?"checked":"" ?>>
				<label>Female</label>
	</div>


<div class="form-check col-md-6">
	 <label for="inputAddress">Hobbies:</label>
 Programming: <input  type="checkbox" name="technology[]" id="blankCheckbox" value=" "/>
 Coding: <input  type="checkbox" name="technology[]" id="blankCheckbox" value="" />
 Editing: <input type="checkbox" name="technology[]" id="blankCheckbox" value="" />
</div>

  </div>
 
<div>
  <button type="submit" name="update" class="btn btn-primary">Update</button>
</div>
 <?php  }?>
</form>
      </div>
     
    </div>
  </div>
</div>















<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Gender</th>
      <th scope="col">Hobbies</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
include('constant.php');
$query = "SELECT * FROM impcrud";
$result = mysqli_query($conn, $query);
 $i=1;
?>
<?php

 
  while($data = mysqli_fetch_assoc($result)) {
 ?>
    <tr id=<?php echo $data['id'];?> >
     <td><?php echo $i++ ?> </td>
   <td><?php echo $data['name']; ?> </td>
   <td><?php echo $data['title']; ?> </td>
   <td><?php echo $data['description']; ?> </td>
   <td><?php echo $data['gender']; ?> </td>
   <td><?php echo $data['technology']; ?> </td>




<td class="actions">
	<a href="" class="btn-sm btn-success" data-toggle="modal" data-target="#editmodal"><i class="fas fa-edit"></i></a>

	<a href="index.php?id=<?php echo $data['id'];?>" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
</td>  
  <?php
  
}
	?>
    </tr>

  
   
  </tbody>
</table>






</body>
</html>