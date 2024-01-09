<?php
include_once 'Product.php';
$prod = new Product;
$result = $prod->getDataById($_GET['id']);

if(isset($_POST["submit"])){

    

$uploads = 'uploads/';
$file_name = rand(1000,9999).'.jpg';
$target = $uploads.$file_name;

move_uploaded_file($_FILES['imagefile']['tmp_name'], $target);

  $id = $_POST['hiddenId'];
  $productname = $_POST['productname'];
  $status = $_POST['radio'];
  $color = implode(',',$_POST['color']);   
  $image = $file_name;

  //$prod = new Product;
  $answer = $prod->update($productname, $status, $color, $image, $id);




}


if($result !== false){
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>


<form action="" method='POST' enctype="multipart/form-data">
  <div class="form-group">
    <label>Product Name</label>
    <input type="text"  class="form-control" name="productname" value="<?=isset($result['productname']) ? $result['productname'] : ''?>">
  </div>

  <div class="form-group">
    <label>Status</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="radio" id="exampleRadios1" value="option1" <?=isset($result['status']) && $result['status'] == 'option1' ? 'checked' : ''?>>
  <label class="form-check-label" for="exampleRadios1">
    Out-of-stock
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radio" id="exampleRadios2" value="option2" <?=isset($result['status']) && $result['status'] == 'option2' ? 'checked' : ''?>>
  <label class="form-check-label" for="exampleRadios2">
    In-stock
  </label>

  <br>
 
  <label>Color</label>
  <br>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" id="defaultCheck1" name="color[]" value="Red" <?php if(isset($result['color']) && strpos($result['color'], 'Red') !== false) {
?>
checked
<?php
  }
  else{

  }
?> > 
  <!--  color[] since it will be storing multiple values!!-->
  <label class="form-check-label" for="defaultCheck1">
    Red
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox"  id="defaultCheck1" name="color[]" value="Yellow" <?php if(isset($result['color']) && strpos($result['color'], 'Yellow') !== false) {
?>
checked
<?php
  }
  else{

  }
?> >
  <label class="form-check-label">
    Yellow
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox"  id="defaultCheck1" name="color[]" value="Orange" <?php if(isset($result['color']) && strpos($result['color'], 'Orange') !== false) {
?>
checked
<?php
  }
  else{

  }
?> >
  <label class="form-check-label" >
    Orange
  </label>
</div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Image</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name = "imagefile">
  </div>

  <input type="hidden" name="hiddenId" value="<?=$result['id']?>">    <!-- Value visible during inspect of page -->

  <input type="submit" class="btn btn-primary" name="submit"/>
</form>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>





<?php



}
else{

    echo "No records found";
    exit;         // ends the script!!


}
?>

