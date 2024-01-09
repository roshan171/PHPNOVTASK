<?php

include "config.php";
$idd=$_GET['id'];

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $status=implode(',',$_POST['status']);

    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_tmp, "images/" . $image_name);

$sql="UPDATE `crudddimg` SET `id`='$idd',`name`='$name',`email`='$email',
`gender`='$gender',`status`='$status',`image`='$image_name' WHERE `id`='$idd'";
// print_r($sql); exit;
$result = mysqli_query($conn,$sql);

if($result){
    // echo "Updated Successfully";
    echo "<script type=\"text/javascript\">
    alert(\"Data Updated Successfully\");
    window.location = \"index.php\"
    </script>";
}

}

$sql = "SELECT * FROM `crudddimg` WHERE `id`='$idd'";
$result = mysqli_query($conn, $sql);

$data=mysqli_fetch_array($result);
$check= $data['status'];
$chk= explode(",",$check)
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	
</head>
<body>
 
<section class="content">
      
        
          <div class="card ">
             <div class="card-header">
                  <div class="row">
                    <div class="col-sm-4">
                        <h3 class="card-title">Update</h3>
                    </div >
                    <div class="col-sm-8">
                        <a href="index.php" class="btn btn-warning" style="float:right;top-margin:-3rem;">Back</a> 
                    </div>
                   </div>
              </div>       
            <div class="card-body">
               
              <form action="" method="POST" enctype="multipart/form-data">
               <input type="hidden" id="id" name="userid" value="<?php echo $data['id'];?>">
                <div class="row">
                    <div class="col-sm-1">
                        <label>Name:</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-group" name="name" value="<?php echo $data['name'];?>" required>      
                    </div>
                    <div class="col-sm-1">
                        <label>Email:</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-group" name="email" value="<?php echo $data['email'];?>" required>      
                    </div>
                    <div class="col-sm-1">
                        <label>Gender:</label>
                    </div>
                    <div class="col-sm-3">
                      Male:  <input type="radio" class="form-group" name="gender" value="male"
                      <?php
                       if($data ['gender']== 'male'){ 
                        echo "checked";
                        } ?> required>  
                       Female: <input type="radio" class="form-group" name="gender" value="female"
                       <?php 
                       if($data ['gender']== 'female')
                       { echo "checked";}  ?> required>    
                    </div>
                </div><br>

                <div class="row">
                <div class="col-sm-1">
                        <label>Status:</label>
                    </div>
                    <div class="col-sm-3">
                      Active:  <input type="checkbox" class="form-group" name="status[]" value="active"
                      <?php  
                      if(in_array('active', $chk)){
                        echo "checked";
                      }
                      ?>
                      > 

                       Pending: <input type="checkbox" class="form-group" name="status[]" value="pending" 
                       <?php  
                      if(in_array('pending', $chk)){
                        echo "checked";
                      }
                      ?>
                       >

                       Suspend:  <input type="checkbox" class="form-group" name="status[]" value="suspend"
                       <?php  
                      if(in_array('suspend', $chk)){
                        echo "checked";
                      }
                      ?>
                       >    
                    </div> 
                    <div class="col-sm-1">
                        <label>File Upload:</label>
                    </div>
                    <div class="col-sm-3">
                      <input type="file" class="form-group" name="image">    
                    </div> 
                    
</div>
<button type="submit" name="update" class="btn btn-primary">Save</button>
</form>
</div>
</div>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>