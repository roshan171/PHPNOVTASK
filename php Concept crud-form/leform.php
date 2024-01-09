<?php 
session_start();
$name=$_SESSION['name'];
// $conn =  mysqli_connect("localhost","lemonmode_trackorder","Lemonmode@123","lemonmode_trackorder");
 $conn=mysqli_connect("localhost", "root", "", "lemonmode_trackorder");


if (isset($_POST['search'])) {

  if(isset($_POST['name']) and $_POST['name']!=''){
    $name=$_POST['name'];
  $addon=" and `name`='$name'";
}

  if(isset($_POST['email']) and $_POST['email']!=''){
    $email=$_POST['email'];
  $addon.=" and `email`='$email'";
}
 if(isset($_POST['order_id']) and $_POST['order_id']!=''){
    $order_id=$_POST['order_id'];
  $addon.=" and `order_id`='$order_id'";
}
if(isset($_POST['quantity']) and $_POST['quantity']!=''){
    $quantity=$_POST['quantity'];
  $addon.=" and `quantity`='$quantity'";
}
if(isset($_POST['price']) and $_POST['price']!=''){
    $price=$_POST['price'];
  $addon.=" and `price`='$price'";
}
if(isset($_POST['mobile']) and $_POST['mobile']!=''){
    $mobile=$_POST['mobile'];
  $addon.=" and `mobile`='$mobile'";
}
if(isset($_POST['zipcode']) and $_POST['zipcode']!=''){
    $zipcode=$_POST['zipcode'];
  $addon.=" and `zipcode`='$zipcode'";
}
if(isset($_POST['address']) and $_POST['address']!=''){
    $address=$_POST['address'];
  $addon.=" and `address`='$address'";
}


$addon=ltrim($addon, 'and');

  echo $query="select * from `sellerdetails` where".$addon; exit;



}





if(isset($_POST["Export"])){
  header('Content-Type: text/csv; charset=utf-8');  
  header('Content-Disposition: attachment; filename=data.csv');  
  $output = fopen("php://output", "w");  

  fputcsv($output, array('Id','Name','Email','Tracking No','Order Id','Quantity','Price','Mobile','Zipcode','Address'));  

  $query = "select * from `sellerdetails`"; 

  $result = mysqli_query($conn, $query);  
  while($row = mysqli_fetch_assoc($result))  
  {
    fputcsv($output,$row);  
  }
  fclose($output);
  exit();
  }
  

if(isset($_POST["Import"])){
    $headerLine = true;
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 100000, ",")) !== FALSE)
           {
             if($headerLine) { $headerLine = false; }
        else {
             $sql = "INSERT into sellerdetails (`name`,`email`,`tracking_number`,`order_id`,`quantity`,`price`,`mobile`,`zipcode`,`address`) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."')";
                   $result = mysqli_query($conn, $sql);}
        if(!isset($result))
        {
           echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"lemonform.php\"
          </script>";    
        }
        else {
          
           echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"lemonform.php\"
              </script>"; 
        }
           }
      
           fclose($file);  
     }
  }   





// Insert Query

if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $email=str_replace(" ","",$_POST['email']);
     $tracking_number=str_replace(" ","",$_POST['tracking_number']);
     $order_id=str_replace(" ","",$_POST['order_id']);
    $quantity=$_POST['quantity'];
    $price=str_replace(" ","",$_POST['price']);
    $mobile=str_replace(" ","",$_POST['mobile']);
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=str_replace(" ","",$_POST['zipcode']);
  
    $address=$_POST['address'];
  

    $sql=mysqli_query($conn,"INSERT INTO `sellerdetails`( `name`, `email`,`tracking_number`, `order_id`,`quantity`,`price`,`mobile`, `city`,`state`, `zipcode`,`address`) VALUES ('$name','$email','$tracking_number','$order_id','$quantity','$price','$mobile','$city','$state','$zipcode','$address')");
    
    if ($sql) {
         echo "<script type=\"text/javascript\">
              alert(\"Data Inserted Successfully\");
              window.location = \"lemonform.php\"
              </script>"; 
    }
// header('location:lemonform.php');
//     exit;

}



// Update Query 

if (isset($_POST['Update'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=str_replace(" ","",$_POST['email']);
    $order_id=str_replace(" ","",$_POST['order_id']);
    $quantity=str_replace(" ","",$_POST['quantity']);
    $price=str_replace(" ","",$_POST['price']);
    $mobile=str_replace(" ","",$_POST['mobile']);
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=str_replace(" ","",$_POST['zipcode']);
   
    $address=$_POST['address'];
  


   $sql="UPDATE `sellerdetails` SET `id`='$id',`name`='$name',`email`='$email',`order_id`='$order_id',`quantity`='$quantity',`price`='$price',`mobile`='$mobile',`city`='$city',`state`='$state',`zipcode`='$zipcode', `address`='$address' WHERE `id` ='$id'";
     // echo $sql;exit;
    if (mysqli_query($conn, $sql)) {
     echo "<script type=\"text/javascript\">
              alert(\"Data Updated Successfully\");
              window.location = \"lemonform.php\"
              </script>"; 

    }
    //   header('location:lemonform.php');
    // exit;


}



// Delete Data 

if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $sql = "DELETE FROM sellerdetails WHERE id='$id'";
  $result=$conn->query($sql);

  if ($result) {
    echo "<script type=\"text/javascript\">
              alert(\"Data deleted Successfully\");
              window.location = \"lemonform.php\"
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panal</title>
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
</head>

<body>

<!--   <?php include 'plugins/lemonmode/sidebar.php'; ?>
    <?php include 'plugins/lemonmode/header.php'; ?> -->
 <!-- <div class="" style="margin-left:18%"> -->
<main class="py-6 bg-surface-secondary ">
 

     
 <button type="button" class="btn-sm btn-primary m-3"   data-toggle="modal" data-target="#addmodal" >
  Add Form
</button>

 


    <div class="" style="font-size: 13px;">
<form action="" method="POST" name="upload_excel"  enctype="multipart/form-data">
    <input type="hidden" name="id" id="id">
  <div class="form-row" style="margin-left:5%">
    <div class="form-group col-4">
      <label for="inputEmail4">Name:</label>
      <input type="text" class="form-control"   style="font-size: 12px;"  name="name" id='name' onkeyup="GetDetail(this.value)" value=""  placeholder="Search Name" >
    </div>
    <div class="form-group col-4">
      <label for="inputEmail4">Email:</label>
      <input type="email" class="form-control" style="font-size: 12px;"  name="email" id="email" value="" placeholder="Search Email" >
    </div>
    <div class="form-group col-3">
      <label for="inputPassword4">Mobile:</label>
      <input type="text" class="form-control"  style="font-size: 12px;" value="" name="mobile" id="mobile"  placeholder="Search Mobile" >
    </div>
  </div>

   <div class="form-row" style="margin-left:5%">
    <div class="form-group col-4">
            <label for="inputPassword4"> Tracking Number:</label>
            <input type="text" name="tracking_number" style="font-size: 12px;" class="form-control" id="tracking_number" value="" placeholder="Search tracking_number" >  
             </div>
    <div class="form-group col-4">
      <label for="inputEmail4">Order Id:</label>
      <input type="text" class="form-control"  value="" style="font-size: 12px;" name="order_id" id="order_id" placeholder="Search orderid" >
    </div>
    <div class="form-group col-3">
      <label for="inputEmail4">Qunatity:</label>
      <input type="text" class="form-control"  value="" style="font-size: 12px;" name="quantity" id="quantity" placeholder="Search quantity" >
    </div>
    
  </div>

  <div class="form-row"  style="margin-left:5%">
    <div class="form-group col-4">
      <label for="inputPassword4">Price:</label>
      <input type="text" class="form-control"  style="font-size: 12px;" value="" name="price" id="price" placeholder="Search price" >
    </div>
   <div class="form-group col-4">
    <label for="exampleFormControlTextarea1">Address:</label>
    <textarea class="form-control"   rows="3" value="" style="font-size: 12px;" name="address" id="address" placeholder="Search Address"></textarea>
  </div>


     <div class="form-group col-3">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" style="font-size: 12px;" value="" id="zipcode" name="zipcode" placeholder="Search zipcode">
    </div>

  </div>

  <div class="" style="margin-left:87%;">
      <button type="submit" class="btn-sm btn-primary" name="search" >Search</button>
  </div>
  
<div class="m-3">
     
        <input type="file" name="file" id="file" class="input-large ml-4" style="font-size:13px;">

      <button type="submit" id="submit" name="Import" class="btn btn-sm btn-primary button-loading" data-loading-text="Loading..." style="margin-right:12px;font-size:13px;color:white;">Import </button>
       
            <button type="submit" name="Export" class="btn btn-sm btn-success border-0" value="Export To Excel" style="color:white;font-size:13px;">Download</button>

</div>
</form></div>
</main>
</div>





<div class="card m-3" style="padding: 1%; ">
<table class="table" id="myTable">
  <thead class="bg-primary text-white" style="font-size: 13px;">
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Track No</th>
        <th scope="col">Order Id</th>
          <th scope="col">Qunatity</th>
     <th scope="col">Price</th>
      <th scope="col">Mobile</th>
      <th scope="col">City</th>
      <th scope="col">state</th>
      <th scope="col">Zip Code</th>

      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody style="font-size: 12px; ">
<?php 
// require_once 'constant.php'; 
     $sql = "SELECT * FROM `sellerdetails` ";
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
    <td> <?php echo $data["tracking_number"]; ?></td>
     <td> <?php echo $data["order_id"]; ?></td>
      <td> <?php echo $data["quantity"]; ?></td>
      <td> <?php echo $data["price"]; ?></td>
    <td> <?php echo $data["mobile"]; ?></td>
    <td> <?php echo $data["city"]; ?></td>
    <td> <?php echo $data["state"]; ?></td>
 <td> <?php echo $data["zipcode"]; ?></td>
 
  <td> <?php echo $data["address"]; ?></td>

        



     <td class="actions ">
     <a href=""  data-toggle="modal" data-target="#editmodal"  class=" btn-sm btn-success editbtn"><i class="fas fa-edit"></i></a>

      <a href="lemonform.php?id=<?php echo $data['id'];?>" class="btn-sm btn-danger trash m-1"><i class="fas fa-trash" ></i></a>

       <a href="" data-toggle="modal" data-target="#viewmodal" class=" btn-sm btn-secondary viewbtn" name="viewbtn"><i class="fas fa-eye"></i> </a>
                </td>

            <?php  }
            ?>
    </tr>
  </tbody>
</table>
</div>



<!-- Modal -->
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
<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4" style="font-size: 13px;">Customer Name:</label>
      <input type="text" style="font-size: 12px;" class="form-control" name="name" id="inputname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4" style="font-size: 13px;">Email:</label>
      <input type="text" style="font-size: 12px;" class="form-control" name="email" id="inputemail">
    </div>
  </div>

  <div class="form-row">
           <div class="col-md-6">
            <label for="inputPassword4" style="font-size: 13px;"> Tracking Number:</label>
            <input type="text" style="font-size: 12px;" name="tracking_number" class="form-control" value="<?php echo rand(); ?>">  
             </div>
              <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">Order Id:</label>
    <input type="text" style="font-size: 12px;" class="form-control" name="order_id" id="inputorderid" placeholder=" ">
  </div>
</div>

             <div class="form-row">
 
  <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">Quantity:</label>
    <input type="text" style="font-size: 12px;" class="form-control" name="quantity" id="inputquantity" placeholder="">
  </div>
   <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">Price:</label>
    <input type="text" style="font-size: 12px;" class="form-control" name="price" id="inputprice" placeholder="">
  </div>
</div>

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">Mobile No:</label>
    <input type="text" style="font-size: 12px;" class="form-control" name="mobile" id="inputmobile" placeholder="">
  </div>
   <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">City:</label>
    <input type="text" class="form-control" style="font-size: 12px;" name="city" id="inputmobile" placeholder="">
  </div></div>

<div class="form-row">
     <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">State:</label>
    <input type="text" class="form-control" style="font-size: 12px;" name="state" id="inputzipcode" placeholder="">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">Zip Code:</label>
    <input type="text" class="form-control" style="font-size: 12px;" name="zipcode" id="inputzipcode" placeholder="">
  </div>
 
</div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1" style="font-size: 13px;">Address:</label>
    <textarea class="form-control" style="font-size: 12px;" id="inputAddress" name="address" rows="3"></textarea>
  </div>
 


  <button type="submit" class="btn btn-info" name="submit">Save</button>
</form>
      </div>
     
    </div>
  </div>
</div>



<!-- Edit Modal -->



<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="exampleModalLabel">Edit Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id3">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4" style="font-size: 13px;">Customer Name:</label>
      <input type="text" class="form-control" style="font-size: 12px;" name="name" id="name3">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4" style="font-size: 13px;">Email:</label>
      <input type="text" class="form-control" style="font-size: 12px;" name="email" id="email3">
    </div>
  </div>

  <div class="form-row">
           <!-- <div class="col-md-6">
            <label for="inputPassword4"> Tracking Number:</label>
            <input type="text" name="barcodeText" class="form-control" value="<?php echo rand(); ?>">  
             </div>  -->

             <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">Order Id:</label>
    <input type="text" class="form-control" style="font-size: 12px;" name="order_id" id="order_id3" placeholder="">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">Quantity:</label>
    <input type="text" class="form-control" style="font-size: 12px;" name="quantity" id="quantity3" placeholder="">
  </div>
</div>

             <div class="form-row">
 
   <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">Price:</label>
    <input type="text" class="form-control" style="font-size: 12px;" name="price" id="price3" placeholder="">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">Mobile No:</label>
    <input type="text" class="form-control" style="font-size: 12px;" name="mobile" id="mobile3" placeholder="">
  </div>
</div>

<div class="form-row">

   <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">City:</label>
    <input type="text" class="form-control" style="font-size: 12px;" name="city" id="city3" placeholder="">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">state:</label>
    <input type="text" class="form-control" style="font-size: 12px;" name="state" id="state3" placeholder="">
  </div>


</div>

<div class="form-row">
  
  <div class="form-group col-md-6">
    <label for="inputAddress" style="font-size: 13px;">Zip Code:</label>
    <input type="text" class="form-control" style="font-size: 12px;" name="zipcode" id="zipcode3" placeholder="">
  </div>
  
</div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1" style="font-size: 13px;">Address:</label>
    <textarea class="form-control" id="address3" style="font-size: 12px;" name="address" rows="3"></textarea>
  </div>
 


  <button type="submit" class="btn btn-info " name="Update">Edit</button>
</form>
      </div>
     
    </div>
  </div>
</div>



<!-- View Modal -->

<div class="modal fade" id="viewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="exampleModalLabel">View Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id2" id="id2">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Customer Name:</label>
      <input type="text" class="form-control" name="name" id="name2" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email:</label>
      <input type="text" class="form-control" name="email" id="email2" readonly>
    </div>
  </div>

  <div class="form-row">
           <!-- <div class="col-md-6">
            <label for="inputPassword4"> Tracking Number:</label>
            <input type="text" name="barcodeText" class="form-control" value="<?php echo rand(); ?>" readonly>  
             </div> --> 
             <div class="form-group col-md-6">
    <label for="inputAddress">Order Id:</label>
    <input type="text" class="form-control" name="order_id" id="order_id2" placeholder="" readonly>
  </div>
 <div class="form-group col-md-6">
    <label for="inputAddress">Quantity:</label>
    <input type="text" class="form-control" name="quantity" id="quantity2" placeholder="" readonly>
  </div></div>

             <div class="form-row">
 

   <div class="form-group col-md-6">
    <label for="inputAddress">Price:</label>
    <input type="text" class="form-control" name="price" id="price2" placeholder="" readonly>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Mobile No:</label>
    <input type="text" class="form-control" name="mobile" id="mobile2" placeholder="" readonly>
  </div>
</div>


<div class="form-row">
    
  <div class="form-group col-md-6">
    <label for="inputAddress">City:</label>
    <input type="text" class="form-control" name="city" id="city2" placeholder="" readonly>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">state:</label>
    <input type="text" class="form-control" name="state" id="state2" placeholder="" readonly>
  </div>



</div>

<div class="form-row">
  
  <div class="form-group col-md-6">
    <label for="inputAddress">Zip Code:</label>
    <input type="text" class="form-control" name="zipcode" id="zipcode2" placeholder="" readonly>
  </div>
</div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Address:</label>
    <textarea class="form-control" id="address2" name="address" rows="3" readonly></textarea>
  </div>
    


 <!--  <button type="submit" class="btn btn-primary" name="Update">Edit</button>
 --></form>
      </div>
     
    </div>
  </div>
</div>

</body>

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
        $('#id3').val(data[0]);
         $('#name3').val(data[1]);
           $('#email3').val(data[2]);
             $('#order_id3').val(data[4]);
             $('#quantity3').val(data[5]);
             $('#price3').val(data[6]);
             $('#mobile3').val(data[7]);
             $('#city3').val(data[8]);
             $('#state3').val(data[9]);
               $('#zipcode3').val(data[10]);
                  $('#address3').val(data[11]);
                
               
                  
                       
});


$('.viewbtn').on('click',function(){
$tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {

            return $(this).text();

        }).get();

        console.log(data);
        $('#id2').val(data[0]);
         $('#name2').val(data[1]);
           $('#email2').val(data[2]);
             $('#order_id2').val(data[4]);
             $('#quantity2').val(data[5]);
             $('#price2').val(data[6]);
             $('#mobile2').val(data[7]);
                $('#city2').val(data[8]);
                   $('#state2').val(data[9]);
               $('#zipcode2').val(data[10]);
                $('#address2').val(data[11]);
              
               
                  
                       
});




});

      // onkeyup event will occur when the user 
        // release the key and calls the function
        // assigned to this event
        function GetDetail(str) {
            if (str.length == 0) {
                document.getElementById("mobile").value = "";
                document.getElementById("order_id").value = "";
                document.getElementById("quantity").value = "";
                 document.getElementById("price").value = "";
                 document.getElementById("email").value = "";
                 document.getElementById("address").value = "";
                 document.getElementById("zipcode").value = "";
                 document.getElementById("tracking_number").value = "";

                return;
            }
            else {
  
                // Creates a new XMLHttpRequest object
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
  
                    // Defines a function to be called when
                    // the readyState property changes
                    if (this.readyState == 4 && 
                            this.status == 200) {
                          
                        // Typical action to be performed
                        // when the document is ready
                        var myObj = JSON.parse(this.responseText);
  
                        // Returns the response data as a
                        // string and store this array in
                        // a variable assign the value 
                        // received to first name input field
                          
                        document.getElementById
                            ("mobile").value = myObj[0];
                          
                        // Assign the value received to
                        // last name input field
                        document.getElementById(
                            "order_id").value = myObj[1];

                         document.getElementById(
                            "quantity").value = myObj[2];

                         document.getElementById(
                            "price").value = myObj[3];

                         document.getElementById(
                            "email").value = myObj[4];

                         document.getElementById(
                            "address").value = myObj[5];

                          document.getElementById(
                            "zipcode").value = myObj[6];

                          document.getElementById(
                            "tracking_number").value = myObj[7];
                    }
                };
  
                // xhttp.open("GET", "filename", true);
                xmlhttp.open("GET", "gfg.php?name=" + str, true);
                  
                // Sends the request to the server
                xmlhttp.send();
            }
        }


</script>

</body>
</html>

