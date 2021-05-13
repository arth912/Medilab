<?php

$name=$_POST['name'];
$email= $_POST['email'];
$mobile= $_POST['mobile'];
$password= $_POST['password'];
$image= $_POST['image'];
$security= $_POST['security'];

$dbconnect=mysqli_connect('localhost','root','','mydb_lab');
$sql="INSERT INTO `user`(`name`, `email`, `mobile`, `image`, `password`, `security`) VALUES ('$name','$email','$mobile','$image','$password','$security')";

$run = mysqli_query( $dbconnect,$sql);
if($run==TRUE){
  echo "your account is successfully created ";
  header("Location:login.php");
}
else{
  echo "error occure, Try again ";
  header("Location:signup.php");
}
?>