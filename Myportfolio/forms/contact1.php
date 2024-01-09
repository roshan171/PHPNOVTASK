<?php
//get data from form  
if (isset($_POST['send'])) {
$name = $_POST['name'];
$email= $_POST['email'];
$message= $_POST['message']; 
$subject = $_POST['subject'];
$to = "youremail@mail.com";

$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $message . "\r\n subject  =" . $subject;
$headers = "From: roshandhawde143@gmail.com" . "\r\n" .
"CC: roshandhawde143@gmail.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
    echo "<script>alert('Thank you for contacting us !');window.location.replace('http://www.com');</script>";
}
}

// $servername = "localhost";
// $username = "root";
// $password = "";
// $mydb = "mydb";

// // Create connection
// $conn = new mysqli($servername, $username, $password,$mydb);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// if (isset($_POST['submit'])) {
//     $name= $_POST['name'];
//     $email= $_POST['email'];
//     $subject= $_POST['subject'];
//     $message = $_POST['message'];

//     $sql = "Insert Into `websiteform` (`name`,`email`,`subject`,`message`) VALUES ('$name','$email','$subject','$message')";
//     $result=mysqli_query($conn,$sql);
//     if($result){
//            echo "Inserted Successfully";
//     }
// }
?>