<?php
include 'config.php';
session_start();

$customer_id = $_SESSION['customer_id'];

if (!isset($customer_id)) {
	// code...
	header('location:customer_login.php');
}
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Payment </title>
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	  <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="stylesheet" href="home.css">
   </head>
   <style >
      body{
      background-color: lightslategray;
      }
   </style>
   <body>
   <?php include 'customer_header.php' ?>
   <div class="form-container">
      <center>
	  <form style="padding-top: 150px;" action="MpesaTest.php" method="POST">

               <h3>Mpesa Payment</h3>
               <br>
               <input class="box" type="number" name="amount" placeholder="Enter Amount" style="margin-top: 60px;">
               <br><br>
               <input class="box" type="number" name="phone_number" placeholder="enter Phone number">
               <br><br>
               <button class="update-btn" style="color: white; background-color: blue;">
               Make Payment Now
               </button>
			</form>
      </center>
      </div>
   </body>
</html>