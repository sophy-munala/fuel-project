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
<html lang="en" dir="ltr">
    <head>
       <meta charset="utf-8">
       <title>My location</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
	   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
	   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
	   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	   <link rel="stylesheet" type="text/css" href="home.css">
    </head>
    <body>

    <?php include 'customer_header.php' ?>
       <div class="heading">
         <h3 class="heading">My <span>Location</span></h3>
       </div>

       <section class="placed-orders">
        
        <div class="box-container">
            <?php
            $location = mysqli_query($conn, "SELECT * FROM `customer` WHERE customer_id = '$customer_id'")
            or die('query failed');
            if(mysqli_num_rows($location) > 0) {
               while ($fetch_location = mysqli_fetch_assoc($location)) { 
            ?>
            <div class="box">
                <table>
                <tr>
                <td style="width: 1000px; height:500px;">
                <iframe src='https://www.google.com/maps?q=<?php echo $fetch_location["longitude"];?>,
                    <?php echo $fetch_location["latitude"];?>&hl=es;z=14&output=embed' style = "width:100%; height:100%;" frameborder="0"></iframe></td>
            </tr>
                </table>
            
            </div>
             <?php
             }
            }else{
                echo '<p class="empty">No orders placed yet!!</p>';
            }
             ?>
 
        </div>
       
       
    </section>

      
            
    
       
    </body>
</html>