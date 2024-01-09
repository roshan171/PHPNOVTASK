<?php  
session_start();
 $conn=mysqli_connect("localhost", "root", "", "lemonmode_trackorder");

// $conn =  mysqli_connect("localhost","lemonmode_trackorder","Lemonmode@123","lemonmode_trackorder");


// Insert Query 

if (isset($_POST['submit'])) {
    $username=str_replace(" ","",$_POST['username']);
    $status=$_POST['status'];
     $day=$_POST['day'];


    $sql=mysqli_query($conn,"INSERT INTO `sellerstatus` (`username`,`status`,`day`) VALUES ('$username','$status','$day')");
    
    if ($sql) {
     echo "<script type=\"text/javascript\">
              alert(\"Data Inserted Successfully\");
              window.location = \"sellerstatuslemon.php\"
              </script>"; 

    }
    //   header('location:sellerstatuslemon.php');
    // exit;


}





// Update Query 

if (isset($_POST['Update'])) {
    $id=$_POST['id'];
    $username=str_replace(" ","",$_POST['username']);
    $status=$_POST['status'];
     $day=$_POST['day'];


    $sql=mysqli_query($conn,"UPDATE `sellerstatus` SET `id`='$id',`username`='$username',`status`='$status',`day`='$day' WHERE id='$id'");
    
    if ($sql) {
     echo "<script type=\"text/javascript\">
              alert(\"Data Updated Successfully\");
              window.location = \"sellerstatuslemon.php\"
              </script>"; 

    }
    //   header('location:sellerstatuslemon.php');
    // exit;


}




// Delete Data 

if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $sql = "DELETE FROM sellerstatus WHERE id='$id'";
  $result=$conn->query($sql);

  if ($result) {
    echo "<script type=\"text/javascript\">
              alert(\"Data deleted Successfully\");
              window.location = \"sellerstatuslemon.php\"
              </script>"; 
 
  }
  else{
    die(mysqli_error($conn));
  }
}














?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

 <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<style type="text/css">
  

</style>


<!--   <?php include 'plugins/lemonmode/sidebar.php'; ?>
    <?php include 'plugins/lemonmode/header.php'; ?>  -->



     
 <button type="button" class="btn-sm btn-primary m-3"   data-toggle="modal" data-target="#addmodal" >
  Add Form
</button>


<!-- Edit Modal -->

<div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="exampleModalLabel">Add Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="" method="POST" >

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4" >Customer Name:</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Enter Name">
    </div>

    <div class="form-group col-md-4">
      <label for="inputPassword4">Status:</label>
      <input type="text" class="form-control" name="status" id="status" placeholder="Enter Status">
    </div> 
    <div class="form-group col-md-4">
    <label for="inputAddress">Days:</label>
    <input type="text" class="form-control" name="day" id="day" placeholder="Enter Days">
  </div>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">submit</button>
</form>
      </div>
     
    </div>
  </div>
</div>




<!-- Edit Modal -->

<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="" method="POST" >
  <input type="hidden" name="id" id="id">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Customer Name:</label>
      <input type="text" class="form-control" name="username" id="username1">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Status:</label>
      <input type="text" class="form-control" name="status" id="status1">
    </div> 
    <div class="form-group col-md-6">
    <label for="inputAddress">Days:</label>
    <input type="text" class="form-control" name="day" id="day1" placeholder="">
  </div>
  </div>


  <button type="submit" class="btn btn-info" name="Update">Update</button>
</form>
      </div>
     
    </div>
  </div>
</div>






<div class="card p-2 m-2" >
<table class="table" id="myTable">
  <thead class="bg-primary text-white" style="font-size:13px;">
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Days</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody style="font-size:12px;">
<?php 
// require_once 'constant.php'; 
     $sql = "SELECT * FROM `sellerstatus` ";
  $result = mysqli_query($conn, $sql);
  $i=1;
  ?>
  <?php
        while($data = mysqli_fetch_assoc($result)){
         ?>
   <tr id=<?php echo $data['id'];?>>
    <td> <?php echo $i++; ?></td>
   <td> <?php echo $data["username"]; ?></td> 
    <td> <?php echo $data["status"]; ?></td>
       <td> <?php echo $data["day"]; ?></td>

 


     <td class="actions ">
     <a href=""  data-toggle="modal" data-target="#editmodal"  class=" btn-sm btn-success editbtn"><i class="fas fa-edit"></i></a>

      <a href="sellerstatuslemon.php?id=<?php echo $data['id'];?>" class="btn-sm btn-danger trash m-1"><i class="fas fa-trash" ></i></a>

                </td>

            <?php  }
            ?>
    </tr>
  </tbody>
</table>
</div>

<script type="text/javascript">

$(document).ready(function () {

let table = new DataTable('#myTable');

$('.editbtn').on('click',function(){
$tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {

            return $(this).text();

        }).get();

        console.log(data);
        $('#id').val(data[0]);
         $('#username1').val(data[1]);
           $('#status1').val(data[2]);
             $('#day1').val(data[3]);
          
               
                  
                       
});




});
</script>