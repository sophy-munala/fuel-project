<?php
include 'config.php';

session_start();

$attendant_id = $_SESSION['attendant_id'];

if(!isset($attendant_id)){

    header('location:attendant_login.php');
}
?>

<!DOCTYPE html>
<html>

    <head>
       <title>Station Attendant Page</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> 
       <link rel="stylesheet" href="admin.css">
    </head>
    
    <body>
        <?php include 'attendant_header.php'?>

         <!--dashboard-->
         <section class="dashboard">
             <h1 class="heading">dashboard</h1>
             <div class="box-container">
                   
                   <div class="box">
                       <?php 
                          $select_orders = mysqli_query($conn, "SELECT * FROM `orders`")or die('query failed');
                          $number_of_orders = mysqli_num_rows($select_orders);
                        ?>
                        <h3><?php echo $number_of_orders; ?></h3>
                        <p> <a href="attendant_placed_orders.php">Orders Placed</a></p>
                   </div>

                   <div class="box">
                       <?php 
                          $select_products = mysqli_query($conn, "SELECT * FROM `products`")or die('query failed');
                          $number_of_products = mysqli_num_rows($select_products);
                        ?>
                        <h3><?php echo $number_of_products; ?></h3>
                        <p> <a href="attendant_view_products.php">Products Added</a></p>
                   </div>
                   

             </div>
         </section>

       







        <script src="attendant_script.js"></script>
    </body>
</html>