<?php 
 
    $host="localhost";
    $user="root";
    $password="";
    $db="bookersdemo";
     
    $conn = mysqli_connect($host,$user,$password);
    mysqli_select_db($conn,$db);
     
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="SELECT * FROM user WHERE email='$email' AND pass='$password'";
    
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        header("Location: confirm_user.php");
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password or Email";
        exit();
    }
?>