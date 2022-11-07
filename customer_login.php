<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `customer` WHERE email = '$email' && password = '$pass'")or die ('query failed');

   //$result = mysqli_query($conn, $select);

   if(mysqli_num_rows($select_users) > 0){
    $row = mysqli_fetch_assoc($select_users);
    if ($row['user_type'] == 'customer') {
        // code...
       $_SESSION['customer_name'] = $row['name'];
       $_SESSION['customer_email'] = $row['email'];
       $_SESSION['customer_id'] = $row['customer_id'];
       header('location:customer_page.php');
     }
    
  }else{
     $message[] = 'Incorrect email or password!';

  }

}

?>

<!DOCTYPE html>
<html>
    <head>
       <title>Login Page</title> 
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
            <form class = "myForm" action="" method="post" autocomplete="off">
                <h3>customer login</h3>
                <h1>Sign into your account</h1><br>
                <input type="email" name="email" required placeholder="enter your email" class="box">
                <input type="password" name="password"required placeholder="******" class="box">
                <input type="hidden" name="longitude" value="" class="box">
                <input type="hidden" name="latitude" value="" class="box">
                <input type="submit" name="submit"value="sign in now" class="btn">
                <br>
                <a href="#">Forgot password?</a>
                <p>don't have an account? <a href="customer_register.php">register now</a></p>
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