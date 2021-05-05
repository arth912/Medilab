<?php

use PHPMailer\PHPMailer\PHPMailer;

  $name= $_POST['name'];
  $email= $_POST['email'];
  $mobile= $_POST['mobile'];
  $date= $_POST['date'];
  $subject= $_POST['subject'];
  $message= $_POST['message'];

  $fromEmail = "medilabcare331@gmail.com";

  $msg = '<!doctype html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
  <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$message.'</span>
    <div class="container">
              Patient Name:-  '.$name.'<br/>
              Appointment Date:-  '.$date.'<br>
              For '.$message.'<br/>
                Regards<br/>
              '.$fromEmail.'
    </div>
  </body>
  </html>';


  require_once "PHPMailer/PHPMailer.php";
  require_once "PHPMailer/SMTP.php";
  require_once "PHPMailer/Exception.php";

  $mail = new PHPMailer();

  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "medilabcare331@gmail.com";
  $mail->Password = 'Admin@123';
  $mail->Port = 465;
  $mail->SMTPSecure = "ssl";
  
  $mail->isHTML(true);
  $mail->setFrom($email);
  $mail->addAddress($email);
  $mail->Subject = ("$email ($subject)");
  $mail->Body = $msg;
  


   $conn = mysqli_connect ('localhost' , 'root' , '' ,'mydb_lab') or die("unable to connect to host");
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $qry = "INSERT INTO `appointment`(`id`, `name`, `email`, `mobile`, `date`, `subject`, `message`) VALUES ('','$name','$email','$mobile','$date','$subject','$message')";
    
    if ($conn->query($qry) === TRUE) {
      echo "New record created successfully !!  ";

    
      if($mail->send())
      { 
        echo "check your email.";
      }
      else{
        $status = "fail";
        $response = "Something goes wrong <br>".$mail->ErrorInfo;

      }
      

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

?>
