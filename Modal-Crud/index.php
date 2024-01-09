<?php

include 'config.php';


// Insert Query

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $status=$_POST['status'];
  
        $sql= mysqli_query($conn,"INSERT INTO crud_modal (`name`,`email`,`phone`,`status`)
        VALUES('$name','$email','$phone','$status')") or die(mysqli_error($conn));
  
       if($sql){
          echo "<script type=\"text/javascript\">
                alert(\"Data Inserted Successfully\");
                window.location = \"index.php\"
                </script>"; 
        }
        else{
         echo "Data not Inserted".mysql_error($conn);
      }
    //  header('location:crm.php');
      //exit;
        }
  

// update data


if(isset($_POST['update'])){
    //  print_r($_POST);
    // echo "point!"; exit;
 
  $id=$_POST['update_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
  $status=$_POST['status'];
 
  $sql = mysqli_query($conn,"UPDATE `crud_modal` SET name='$name',email='$email',phone='$phone',
  status='$status' WHERE id='$id'")or die(mysqli_error($conn));
     
 
      if($sql){
         echo "<script type=\"text/javascript\">
               alert(\"Data Updated Successfully\");
               window.location = \"index.php\"
               </script>"; 
       }
       else{
        echo "Data not Updated".mysql_error($conn);
     }
        // header('location:crm.php');
    //exit;
       }
 
 






        // delete data
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
          
            $sql = "DELETE FROM crud_modal WHERE id='$id'";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="container ">
    <h2 class="text-center mt-3">Modal Crud</h2>

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add form
</button>

<?php
    $dashcount=mysqli_fetch_array(mysqli_query($conn,"select count(id) as cn from `crud_modal` where status='done'"));
    $done = $dashcount['cn'];
    $dashcounts=mysqli_fetch_array(mysqli_query($conn,"select count(id) as cn from `crud_modal` where status='pending'"));
    $pending = $dashcounts['cn'];
    ?>

    <button type="submit" name="done" class="btn btn-success " >Done(<?php echo $done; ?>)</button>
    <button type="submit" name="pending" class="btn btn-warning ">Pending(<?php echo $pending; ?>)</button>




<!-- table -->

<div class="container">
<table class="table mt-3" id="myTable">
  <thead class=" text-dark" style="border-radius: 5px; background-color:#a0c8c3;" >
    <tr>
      <th scope="col">Id</th>
      <th scope="col"> Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $sql= "SELECT * FROM crud_modal";
   $result = mysqli_query($conn, $sql);
        while($emp = mysqli_fetch_assoc($result)){
            
         ?>
<tr>
  <td><?php echo $emp['id'];?></td>
<td><?php echo $emp["name"]; ?></td>
<td><?php echo $emp["email"]; ?></td>
<td><?php echo $emp["phone"]; ?></td>
<td><?php echo $emp["status"]; ?></td>
<!-- <td><?php 
      if ($emp["status"]== "Done"){
        echo "<button class='btn btn-success'> Done</button>";
      }
      else{
        echo "<button class='btn btn-warning'> Pending</button>";
      }
      ?>
</td> -->


<td class="actions ">
     <a href="index.php?id=<?php echo $emp['id'];?>"  data-bs-toggle="modal" data-bs-target="#editModal" class=" btn btn-warning editbtn"><i class="fas fa-edit"></i></a>

      <a href="index.php?id=<?php echo $emp['id'];?>" onclick="alert('are you sure to delete this data?')" class="btn btn-danger trash m-1"><i class="fas fa-trash" ></i></a>

                </td>
</tr>
<?php }?>



    </tbody>
    </table>




</div>





<!--add Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="text" class="form-control"  name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Phone</label>
    <input type="text" class="form-control"  name="phone">
  </div>
  <div class="mb-3">
  <label for="exampleFormStore">Status</label>
    <select class="form-control"  name="status">
      <option>Select Status</option>
      <option >Done</option>
      <option >Pending</option>
    </select>
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
</form>
      </div>
    
    </div>
  </div>
</div>

    </div>


<!--edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
        <input type="hidden" name="update_id" id="update_id">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone">
  </div>
  <div class="mb-3">
  <label for="exampleFormStore">Status</label>
    <select class="form-control" id="Status" name="status">
      <option></option>
      <option >Done</option>
      <option >Pending</option>
    </select>
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </div>
</form>
      </div>
    
    </div>
  </div>
</div>

    </div>

















<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script type="text/javascript">
  
$(document).ready(function () {
$('.editbtn').on('click',function(){
$tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {

            return $(this).text();

        }).get();

        console.log(data);
        $('#update_id').val(data[0]);
           $('#name').val(data[1]);
             $('#email').val(data[2]);
             $('#phone').val(data[3]);
              $('#Status').val(data[4]);
                       
});
});

</script>

</body>
</html>