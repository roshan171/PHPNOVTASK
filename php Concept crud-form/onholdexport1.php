<?php 
session_start();
include('constant.php');


// $object    = new Constants1();
// $constants = $object->constant1();
// $conn      = $constants['connection'];
// $rooturl   = $constants['rooturl'];


$base_url = $_SERVER['DOCUMENT_ROOT']; 



if(isset($_POST["Export"])){
  $store_name=$_POST['store_name'];
  $received_order_status=$_POST['received_order_status'];

    if(isset($_POST['start_date']) && isset($_POST['end_date']))
    {
           $start_date = $_POST['start_date'];
           $end_date = $_POST['end_date'];              
                               
            
 
  header('Content-Type: text/csv; charset=utf-8');  
  header('Content-Disposition: attachment; filename=data.csv');  
  $output = fopen("php://output", "w");  

  fputcsv($output, array('Order Id','sku','Item Price','Item Tax','Buying Price','Earning','Quantity Purchased','Auto Comments'));  

  $query = "SELECT SUBSTRING(order_id FROM 1 FOR CHAR_LENGTH(order_id) - 2) AS `order_id`,`sku`,`item_price`,`item_tax`,`buying_price`,`earning`,`quantity_purchased`,`auto_comments` FROM `orders` where  `orderprocess_datetime` BETWEEN '$start_date' AND '$end_date'  and `store_name` ='$store_name' and `received_order_status` ='$received_order_status' ";

  $result = mysqli_query($conn, $query);  
  while($row = mysqli_fetch_assoc($result))  
  {
    fputcsv($output,$row);  
  }
  fclose($output);
  exit();
  }  
  else{

  header('Content-Type: text/csv; charset=utf-8');  
  header('Content-Disposition: attachment; filename=data.csv');  
  $output = fopen("php://output", "w");  

  fputcsv($output, array('Order Id','sku','Item Price','Item Tax','Buying Price','Earning','Quantity Purchased','Auto Comments'));  

  $daop=date('Y-m-d');
  $query = "SELECT SUBSTRING(order_id FROM 1 FOR CHAR_LENGTH(order_id) - 2) AS `order_id`,`sku`,`item_price`,`item_tax`,`buying_price`,`earning`,`quantity_purchased`,`auto_comments` FROM `orders` where  `orderprocess_datetime` LIKE '$daop%' and `store_name` ='$store_name' and `received_order_status` ='$received_order_status' ";

  $result = mysqli_query($conn, $query);  
  while($row = mysqli_fetch_assoc($result))  
  {
    fputcsv($output,$row);  
  }
  fclose($output);
  exit();
  }
}  



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Uploading</title>
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

<main class="py-6 bg-surface-secondary">
  <div class="container-fluid ">

      <div class="row mt-2 mb-3 ml-1">
      <div class="col-md-12 ">

  <div class="card ">
    <div class="card-header">
        <h3 class="card-title">Download Your Sheet (Csv) &nbsp; <i class="fa fa-regular fa-file-csv"></i></h3>
 
</div>
      <form action="" method="POST" name="upload_excel" enctype="multipart/form-data" style="float:right;margin-top: 35px; margin-bottom:20px;">
        
 <select style="width: 15%;height: 24px; margin-left: 10px;" name="store_name">

                                                        <option selected="selected" style="font-size: 12px;">Ecom Waves</option>

                                                        <option style="font-size: 12px;" value="Ecomretails_usa">Ecom Retails USA</option>

                                                        <option style="font-size: 12px;" value="Open orders">Open Orders </option>

                                                        <option style="font-size: 12px;" value="">#BookWala</option>

                                                        <option style="font-size: 12px;" value="">Global Reseller</option>

                                                        <option style="font-size: 12px;" value="">Emyntra USA </option>

                                                        <option style="font-size: 12px;" value="">Global Hub India </option>
                                                        
                                                        <option style="font-size: 12px;" value="Whitebark">Whitebark</option>
                                                        
                                                        <option style="font-size: 12px;" value="Global_hub_uae">Global Hub UAE </option>
                                                        
                                                                       
                                                        <option style="font-size: 12px;" value="Onlineaddaind">Onlineaddaind </option>
                                                        
                                                         <option style="font-size: 12px;" value="EcomretailsUAE">EcomretailsUAE </option>


                                                    </select>

                                                    <select style="width: 15%;height: 24px; margin-left: 10px;" name="received_order_status">

                                                       
                                                        <option selected="selected" style="font-size: 12px;" value="OnHold">OnHold</option>

                                                        <option style="font-size: 12px;" value="New">New </option>

                                                        <option style="font-size: 12px;" value="Auxhold">Auxhold</option>

                                                        <option style="font-size: 12px;" value="Full Refund">Full Refund</option>

                                                        <option style="font-size: 12px;" value="Partial Refund">Partial Refund</option>

                                                        <option style="font-size: 12px;" value="Completed">Completed </option>
                                                        
                                                        <option style="font-size: 12px;" value="ShipGlobal">ShipGlobal</option>
                                                        
                                                        <option style="font-size: 12px;" value="Bombino">Bombino</option>
                                                        
                                                                       
                                                        <option style="font-size: 12px;" value="PPO">PPO </option>
                                                        
                                                         <option style="font-size: 12px;" value="Delivered">Delivered </option>


                                                    </select>

                                                         <select name="search" id="search" class="form-control1 search" style="font-size:15px; margin-left: 10px; height: 24px; text-align: center; width: 15%;">
                                                              <option value="">Select search filter</option>
                                                             <option value="purchase_date" style="font-size:15px;">Filter by  dates:</option>
                                                                  </select>
 <div class="mt-4 textall" style="font-size:10px; ">
                                                           
        <div class="p_date mb-1"></div>
                   </div>
                           
                                                            
            <button type="submit" name="Export" class="btn btn-sm btn-success border-0 m-3" value="Export To Excel" style="color:white;font-size:13px;background-color:#6b8b9f;">Download <i class="fa fa-regular fa-download ml-2" style="font-size:15px;"></i></button>
          
    </form>


    



    
    </div>
  </div>
 </div>
       
</div>
</main>

</body>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
   <script src="<?php $base_url; ?>/AI/order/oauth/plugins/jquery/jquery.min.js"></script>
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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function(){
 $(".search").change(function() {
            var selectedoption = $(".search option:selected");
            var selectdata = selectedoption.val();
            console.log(selectdata);


if (selectdata == 'purchase_date') {
                $(".textall .p_date").append("<div class='row' id='pr' style=margin-left:12px;><div class='col-sm-2 mt-1' style=font-size:17px; >" + selectedoption.text() + ":</div><div class='col-sm-2'><input type='date' name='start_date' class='form-control'></div><div class='col-sm-1 text-center' style=font-size:15px;><b>To</b></div><div class='col-sm-2'><input type='date' name='end_date' class='form-control'></div></div><div class='col-sm-1 mt-2'></div>");
                // <div class='col-sm-1' id='DeleteRow'><i class='bi bi-x-lg'></i>
                // $("body").on("click", "#DeleteRow", function() {
                //     $(this).parents("#pr").remove();
                // });
            }
             else {
                $(".textall .p_date").empty();
            }
          });
        });
</script>

</body>
</html>