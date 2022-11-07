<?php

 //session_start();

include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $tel = $_POST['tel'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];

    $select_users = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$email' && password = '$pass'")or die ('query failed');

    //$result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($select_users) > 0){
 
       $message[] = 'user already exist!';
 
    }else{
 
       if($pass != $cpass){
          $message[] = 'password not matched!';
       }else{
         mysqli_query($conn, "INSERT INTO `customer`(name, email, password, tel_no, longitude, latitude) VALUES('$name','$email', '$pass','$tel', '$longitude', '$latitude')")or die('query failed');
             $message[] = 'Registration Succesfull!!';
             header('location:customer_login.php');
       }
    }
 
 }
 
 ?>
   
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer Register</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload="getLocation();">

    <?php
        if(isset($message)){
         foreach($message as $message){
             echo '<div class="message"> <span>'.$message.'</span>
            <i class="fas fa-times".onclick="this.parentElement.remove();"></i>
        </div>';
                    };
                };
         ?>

    <div class="form-container">
            <form action="" method="post"  class = "myForm">
                <h3>Sign up</h3>
                <input type="text" name="name" class="box" required placeholder="enter your name">
                <input type="email" name="email" class="box" required placeholder="example@gmail.com">
                <input type="password" name="password" class="box" required placeholder="enter your password">
                <input type="password" name="cpassword" class="box" required placeholder="confirm your password">
                <input type="text" name="tel" class="box" required placeholder="+245 (0) 12345678">
                <input type="hidden" name="longitude" value="" class="box">
                <input type="hidden" name="latitude" value="" class="box">
                <select name="user_type" id="" class="box">
                    <option value="customer">customer</option>
                </select>
                <input type="submit" name="submit" value="sign up now" class="btn">
                <p>already have an account? <a href="customer_login.php">login now</a></p>
            </form> 

            <script type="text/javascript">
                function getLocation(){
                    if(navigator.geolocation){
                        navigator.geolocation.getCurrentPosition(showPosition,showError);
                    }
                }
                function showPosition(position){
                    document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
                    document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
                }
                function showError(error){
                    switch(error.code){
                        case error.PERMISSION_DENIED:
                            alert("Please turn on your location to continue");
                            location.reload();
                            break
                    }
                }

            </script>
        </div>
    </body>

</html>