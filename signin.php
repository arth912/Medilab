<?php


session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
}   

$email= $_POST['email'];
$password= $_POST['password'];


$email=stripcslashes($email);
$password=stripcslashes($password);

$dbconnect=mysqli_connect('localhost','root','','mydb_lab');

$result=mysqli_query($dbconnect,"SELECT * FROM `user` WHERE `email`='$email'and `password`=$password")
          or die("failed to query database".mysql_error());
$row=mysqli_fetch_assoc($result);
$_SESSION['email'] = $row['email'];

if($row['email']==$email && $row['password']==$password)
{
  header("Location:index.php");
}
else{
  echo "failed to login.";
  header("Location:login.php");
}

?>