<?php
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:admin_login.php');
};
if (isset($_POST['add_product'])) {
    // code...
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $decsription = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'image/' .$image;
    $select_product_name = mysqli_query($conn, "SELECT name FROM `automotive` WHERE name = '$name'")or die('query failed');
    if (mysqli_num_rows($select_product_name) >0) {
        // code...
        $message[] = 'The product name already added';
    } else{
        $add_product_query = mysqli_query($conn, "INSERT INTO `automotive`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');

        if ($add_product_query) {
            if ($image_size >2000000) {
                // code...
                $message[] = 'the size of the image is too large!!';
            }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product was succesfully added!!';
            }
            
        }else{
           $message[] = 'the product could not be added!!';
        }
    }
}
if (isset($_GET['delete'])) {
    // code...
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `automotive` WHERE automotive_id = '$delete_id'")or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('image/'.$fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `automotive` WHERE automotive_id = '$delete_id'") or die('query failed');
    header('location:admin_automotive.php');
}
if (isset($_POST['update_product'])) {
    // code...
    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_descrition = $_POST['update_description'];
    $update_price = $_POST['update_price'];
    mysqli_query($conn, "UPDATE `automotive` SET name = '$update_name', description = '$update_descrition', price = '$update_price' WHERE automotive_id = '$update_p_id'")or die('query failed');
     
     $update_image = $_FILES['update_image']['name'];
     $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
     $update_image_size = $_FILES['update_image']['size'];
     $update_folder = 'image/'.$update_image;
     $update_old_image = $_POST['update_old_image'];
     if (!empty($update_image)) {
        // code...
        if ($update_image_size > 20000000) {
            // code...
            $message[] = 'image file is too large';
        }else{
            mysqli_query($conn, "UPDATE `automotive` SET image = '$update_image' WHERE id = '$update_p_id'")or die('query failed');
            move_uploaded_file($update_image_tmp_name, $update_folder);
            unlink('image/'.$update_old_image);
        }
    }
    header('location:admin_automotive.php');
}

?>

<!DOCTYPE html>
<html>

    <head>
       <title>Automotives</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> 
       <link rel="stylesheet" href="admin.css">
    </head>
    
    <body>
        <?php include 'admin_header.php'?>

        <!-- admin add product section-->

        <section class="add-products">
            <h1 class="heading"> products</h1>
            <form method="post" enctype="multipart/form-data">
                <h3> add Auto-motives products</h3>
                <input type="text" name="name" class="box" placeholder="product name" required>
                <input type="text" name="description" class="box" placeholder="description" >
                <input type="number" min="0" name="price" class="box" placeholder="product price" required>
                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
                <input type="submit" name="add_product" value="add product" class="btn">
            </form>
        </section>

        <!--show the products-->
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
                     <a href="admin_automotive.php?update=<?php echo $fetch_products['automotive_id'];?>" class= "btn">Update</a>
                     <a href="admin_automotive.php?delete=<?php echo $fetch_products['automotive_id'];?>" class= "delete-btn" onclick ="return confirm(' are you sure you want to delete this product?');" >Delete</a>
                 </div>
                 <?php
             }
                 }else{
                    echo'<p class = "empty"> no products added yet!!</p>';
                   } 

                  ?>
            </div>
        </section>

        <!--edit product section-->

        <section class="edit-automotive-form">
            <?php 

            if (isset($_GET['update'])) {
                // code...
                $update_id = $_GET['update'];
                $update_query = mysqli_query($conn, "SELECT * FROM `automotive` WHERE automotive_id = '$update_id'") or die('query failed');
                if (mysqli_num_rows($update_query) >0) {
                    // code...
                    while($fetch_update = mysqli_fetch_assoc($update_query)){
          ?>
          <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['automotive_id'];?>">
            <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image'];?>">
              <img src="image/<?php echo $fetch_update['image'];?>">
              <input type="text" name="update_name" value="<?php echo $fetch_update['name'];?>" class = "box" placeholder= "enter product name">
              <input type="text" name="update_description" value="<?php echo $fetch_update['description'];?>" class = "box" placeholder= "enter product description">
              <input type="number" name="update_price" value="<?php echo $fetch_update['price'];?>" min = "0" class = "box" placeholder= "enter product price">
              <input type="file" name="update_image" class="box" accept="image/jpg, image/jpeg, image/png">
              <input type="submit" name="update_product" value="update" class="btn">
              <input type="reset" name="update_product" value="cancel" class="option-btn" id="close-update">
          </form>

          <?php 
         }
     }
  }else{
  echo '<script>document.querySelector(".edit-automotive-form").style.display = "none";</script>';
    }

           ?>
        </section>


       







        <script src="admin_script.js"></script>
    </body>
</html>