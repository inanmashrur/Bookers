<?php

  $host="localhost";
  $user="root";
  $password="";
  $db="Bookersdemo";
   
  $conn = mysqli_connect($host,$user,$password);
  mysqli_select_db($conn,$db);

  $mailto = $_POST['email'];
  
  $sql="SELECT * FROM user WHERE email='$mailto'";
    
  $result=mysqli_query($conn,$sql);
    
  if(mysqli_num_rows($result)==1){

    $mailSub = "Recover Password";
    $mailMsg = "Your recovery code is 12345";

    require 'PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail ->IsSmtp();
    $mail ->SMTPDebug = 0;
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = "smtp.gmail.com";
    $mail ->Port = 465; // or 587
    $mail ->IsHTML(true);
    $mail ->Username = "tempdrive68@gmail.com";
    $mail ->Password = "nrop4321";
    $mail ->SetFrom("tempdrive68@gmail.com");
    $mail ->Subject = $mailSub;
    $mail ->Body = $mailMsg;
    $mail ->AddAddress($mailto);

    if(!$mail->Send())
    {
      echo "Mail Not Sent.\nPlease contact at bookers@gmail.com";
    }
    else
    {
      header("Location: logged-home.html");
    }
  }
  else{
    echo "No User found with this mail";
  }

?>