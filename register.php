<?php 
 
    $host="localhost";
    $user="root";
    $password="";
    $db="Bookersdemo";
     
    $conn = mysqli_connect($host,$user,$password);
    mysqli_select_db($conn,$db);
  
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    
    $sql="INSERT INTO user VALUES ('123', '$email', '$password','xyz')";
    
    $result=mysqli_query($conn,$sql);
    
    if( $result ){
        echo "Registration successfull!";
        header("Location: logged-home.html");
        exit();
    }
    else{
        echo "Error occured!!!";
        exit();
    }
?>