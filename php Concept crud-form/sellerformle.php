<?php  
session_start();
// $name=$_SESSION['username'];   
 $conn=mysqli_connect("localhost", "root", "", "lemonmode_trackorder");
// $conn =  mysqli_connect("localhost","lemonmode_trackorder","Lemonmode@123","lemonmode_trackorder");


// Update Query 

if (isset($_POST['Update'])) {
    $id=$_POST['id'];
    $name=str_replace(" ","",$_POST['username']);
    $email=str_replace(" ","",$_POST['email']);
 
  

    $sql=mysqli_query($conn,"UPDATE `register` SET `id`='$id',`username`='$name',`email`='$email' WHERE `id`='$id'");
    
    if ($sql) {
     echo "<script type=\"text/javascript\">
              alert(\"Data Updated Successfully\");
              window.location = \"sellerformlemon.php\"
              </script>"; 

    }
    //   header('location:sellerformlemon.php');
    // exit;


}












// Delete Data 

if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $sql = "DELETE FROM register WHERE id='$id'";
  $result=$conn->query($sql);

  if ($result) {
    echo "<script type=\"text/javascript\">
              alert(\"Data deleted Successfully\");
              window.location = \"sellerformlemon.php\"
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
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
   
  <!-- new links -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


  <style type="text/css">

  element.style {
    color: white;
    margin-right: 3px;
    font-size: 10px;
}

  .btn-success {
    color: #fffff;
    box-shadow: none;
}

.btn-group-sm>.btn, .btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 10px;
    line-height: 1.5;
    border-radius: 0.2rem;
}
.btn-primary {
    color: #fff;
    /*background-color: #007bff;
    border-color: #007bff;*/
    box-shadow: none;
}
.btn {
    display: inline-block;
    font-weight: 400;
   /* color: #212529;*/
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

     .card {

    box-shadow: 0px 5px 10px #6b8b9f !important;

    border-radius:6px; 

  }

   

.input-group-text{

    float: right !important;

    margin-top: 12px;

}
  .card-header{
  background-color: #6b8b9f;
  color: azure;
  }


  </style>
<body>


<div class="card m-3" style="padding:3%">
<table class="table " id="myTable">
  <thead class="bg-primary text-white" style="font-size:14px;">
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody style="font-size:13px;">
<?php 
// require_once 'constant.php'; 
  $sql = "SELECT * FROM `register` ";
  $result = mysqli_query($conn, $sql);
  $i=1;
  ?>
  <?php
        while($data = mysqli_fetch_assoc($result)){
         ?>
   <tr id=<?php echo $data['id'];?>>
    <td> <?php echo $i++; ?></td>
   <td> <?php echo $data["username"]; ?></td>
    <td> <?php echo $data["email"]; ?></td>
     


 


     <td class="actions ">
     <a href=""  data-toggle="modal" data-target="#editmodal"  class=" btn btn-success editbtn" ><i class="fas fa-edit"></i></a>

      <a href="sellerformlemon.php?id=<?php echo $data['id'];?>" class="btn btn-danger trash m-1" ><i class="fas fa-trash" ></i></a>

     <a href="lemonform.php?username=<?php echo $data['username'];?>" class="btn btn-secondary  m-1" ><i class="fa fa-external-link" ></i></a>
     <?php
           if(isset($_POST['atv'])){
                $id=$_POST['id'];
                $atv=$_POST['atv'];
                $sql=mysqli_query($conn,"UPDATE `register` SET `status`='$atv' WHERE `id`='$id'");
    
            if ($sql) {
             echo "<script type=\"text/javascript\">
                      alert(\"Data Updated Successfully\");
                      window.location = \"sellerformlemon.php\"
                      </script>"; 

            }
           }
     ?>
     <form action="" method="POST">
     <?php
                        $status = $data['status'];
                        echo '<input type="hidden" name="id" id="id">';
                        if ($status == 1)
                        {
                            echo "<button type='submit' name='atv' class=' btn btn-success editbtn' value='2'><i class='fa fa-dot-circle-o'></i></button>";
                        }

                        elseif ($status == 2)
                        {
                            echo "<button type='submit' name='atv' class=' btn btn-danger editbtn' value='1'><i class='fa fa-dot-circle-o'></i></button>";
                        }
                        ?>
      </form>
                </td>

            <?php  }
            ?>
    </tr>
  </tbody>
</table>
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
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Customer Name:</label>
      <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email:</label>
      <input type="text" class="form-control" name="email" id="email">
    </div></div>
 <!--    <div class="row">
          <div class="form-group col-md-6">
    <label for="Store">Status</label>
    <select class="form-control"  name="status" id="status" value="" >
      <option >Select Status</option>
      <option value="1">Active</option>
      <option value="2">Inactive</option>
    </select>
  </div></div> -->
  

  

  <button type="submit" class="btn btn-info" name="Update">Edit</button>
</form>
      </div>
     
    </div>
  </div>
</div>





<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>

<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <script src="../plugins/select2/js/select2.full.min.js"></script>

  <!-- new links -->
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>



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
         $('#username').val(data[1]);
           $('#email').val(data[2]);
           $('#status').val(data[3]);
            
                  
                       
});

});




</script>


</body>
</html>



