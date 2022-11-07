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

        <!--show the products-->
          <section class="show-products">
             <h1 class="heading"> products Added</h1>
            <div class="box-container">
                <?php 
                   $select_products = mysqli_query($conn, "SELECT * FROM `products`")or die('query failed');
                   if (mysqli_num_rows($select_products) > 0) {
                       // code...
                    while($fetch_products = mysqli_fetch_assoc($select_products)){  
                 ?>
                 <div class="box">
                     <img src="image/<?php echo $fetch_products['image']; ?>">
                     <div class="name"><?php echo $fetch_products['name']; ?></div>
                     <div class="price"><?php echo $fetch_products['price']; ?>/-</div>
                     
                 </div>
                 <?php
             }
                 }else{
                    echo'<p class = "empty"> no products added yet!!</p>';
                   } 

                  ?>
            </div>
        </section>
        <section class="show-products">
            <div class="box-container">
                <?php 
                   $select_products = mysqli_query($conn, "SELECT * FROM `automotive`")or die('query failed');
                   if (mysqli_num_rows($select_products) > 0) {
                       // code...
                    while($fetch_products = mysqli_fetch_assoc($select_products)){  
                 ?>
                 <div class="box">
                     <img src="image/<?php echo $fetch_products['image']; ?>">
                     <div class="name"><?php echo $fetch_products['name']; ?></div>
                     <div class="name"><?php echo $fetch_products['description'];?></div>
                     <div class="price"><?php echo $fetch_products['price']; ?>/-</div>
                     
                 </div>
                 <?php
             }
                 }else{
                    echo'<p class = "empty"> no products added yet!!</p>';
                   } 

                  ?>
            </div>
        </section>

         
        <script src="attendant_script.js"></script>      
    </body>
</html>