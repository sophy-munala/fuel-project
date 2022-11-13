<?php
include 'config.php';

session_start();

$attendant_id = $_SESSION['attendant_id'];

if(!isset($attendant_id)){

    header('location:attendant_login.php');
}

if (isset($_POST['update_dispatch'])) {
    // code...
    $order_update_id = $_POST['del_id'];
    $update_delivery = $_POST['update_delivery'];
    mysqli_query($conn, "UPDATE `orders` SET dispatch_status = '$update_delivery' WHERE order_id = '$order_update_id'")or die('query failed');
    $message[] = 'dispatch status has been updated!!';
}

if (isset($_GET['delete'])) {
    // code...
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `orders` WHERE order_id = '$delete_id'")or die('query failed');
    header('location:attendant_placed_orders.php');
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

<!-- view customers eligible to be delivered for fuel-->
        <section class="placement">
          <h1 class="heading">Customer's<span>Placed Orders</span></h1>
          <div class="box-container">

               <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders`")or die('query failed');
                if (mysqli_num_rows($select_orders) >0 ) {
                    // code...
                    while($fetch_orders = mysqli_fetch_assoc($select_orders)){
               ?>
            <div class="box">
          <p>Customer id: <span><?php echo $fetch_orders ['customer_id']; ?></span></p>
          <p>Name: <span><?php echo $fetch_orders ['name']; ?></span></p>
          <p>Email: <span><?php echo $fetch_orders ['email']; ?></span></p>
          <p>Phone Number: <span><?php echo $fetch_orders ['tel_no']; ?></span></p>
          <p>Address: <span><?php echo $fetch_orders ['address']; ?></span></p>
          <p>Date Placed: <span><?php echo $fetch_orders ['placed_on']; ?></span></p>
          <p>Total Products: <span><?php echo $fetch_orders ['total_products']; ?></span></p>
          <p>Payment status: <span style="color:<?php if ($fetch_orders ['payment_status'] == 'pending')
          {echo 'red';}else{echo'orange';}?>;"><?php echo $fetch_orders['payment_status'];?></span></p>

                    <form method="post">
                        <input type="hidden" name="del_id" value="<?php echo $fetch_orders['order_id'];?>">
                        <select name="update_delivery"> 

                            <option value="" selected disabled><?php echo $fetch_orders['dispatch_status'];?></option>
                            <option value="delayed">Delayed</option>
                            <option value="dispatched">Dispatched</option>

                        </select>

                        <input type="submit" value="update" name="update_dispatch" class="btn">
                        <a href="attendant_placed_orders.php?delete=<?php echo $fetch_orders['order_id'];?>" onclick = "return confirm('are you sure you want to delete this order?');" class="delete-btn">delete</a>

                    </form>
          
            </div>
            
            <?php
             }
            }else{
                echo '<p class="empty">No orders placed yet!!</p>';
            }
             ?>
          </div>

        </section>












        
        <script src="attendant_script.js"></script>      
    </body>
</html>