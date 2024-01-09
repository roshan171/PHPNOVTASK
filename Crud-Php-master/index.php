<?php
include_once 'Product.php';

$prod = new Product;
$result = $prod->displayAllProducts();


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
    <div class="container">
<!-- 
<table border="1">
    <tr>
        <td>Product Name</td>
        <td>Status</td>
        <td>Color</td>
        <td>Image</td>
        <td>Action</td>

    </tr>

    <tr>
        <td>ABC</td>
        <td>undergoing</td>
        <td>Color</td>
        <td>Image</td>
        <td>Action</td>
    </tr>
    <tr></tr>
    <tr></tr>
</table> -->

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Color</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    
<?php 
if($result !== false){

  foreach($result as $data){

?>

<tr>
<td><?=$data['id']?></td>
  <td><?=$data['productname']?></td>
  <td><?=$data['status']?></td>
  <td><?=$data['color']?></td>
  <td><image width="100" height="100" src="uploads/<?=$data['fileimage']?>"></td>
  <td><a href="edit.php?id=<?=$data['id']?>">edit</a></td>
  <td><a href="delete.php?id=<?=$data['id']?>">delete</a></td>

</tr>

<?php
  }

  }
  else{
  ?>

  <tr><td colspan="4">No data found!!</td></tr>

  <?php
  }
  ?>


    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr> -->

  </tbody>
</table>



</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  </body>
</html>