<?php
include 'config.php';
session_start();

$customer_id = $_SESSION['customer_id'];

if (!isset($customer_id)) {
	// code...
	header('location:customer_login.php');
}

if(isset($_POST['add_to_cart'])){
	$product_name = $_POST['product_name'];
	$product_description = $_POST['product_description'];
	$product_price = $_POST['product_price'];
	$product_image = $_POST['product_image'];
	$product_quantity = $_POST['product_quantity'];
	

	$check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND customer_id = '$customer_id'")or die ('query failed');

	if(mysqli_num_rows($check_cart_numbers) > 0){
		$message[] = 'already added to cart';
	}else{
		mysqli_query($conn, "INSERT INTO `cart`(customer_id, name, price, quantity, image) VALUES('$customer_id','$product_name', '$product_price','$product_quantity','$product_image')")or die('query failed');
		$message[] = 'product added to cart';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>

	<?php include 'customer_header.php' ?>

	<!--home section -->

	<section class="home" >
		<div class="content">
			<h3>best<span> automotive & fuel delivery </span>at your door step</h3>
			<p>We stand for something good in everything we do, by carefully sourcing premium products.</p>
			<a href="about.php" class="btn">Discover More</a>
		</div>
	</section>
	
	<!--product section-->
	<section class="products" id="product">
	<h1 class="heading">Available <span> products</span></h1>
		<div class="box-container">
			<?php
			$select_products = mysqli_query($conn, "SELECT * FROM `products`")or die('query failed');
			if(mysqli_num_rows($select_products) > 0){
             while($fetch_products = mysqli_fetch_assoc($select_products)){
			?>
			<form action="" method="post" class="box">
			<img src="image/<?php echo $fetch_products['image'];?>" alt="">
			<div class="name"><?php echo $fetch_products['name'];?></div>
			<div class="description"><?php echo $fetch_products['description'];?></div>
			<div class="price"><?php echo $fetch_products['price'];?>/-</div>
			<input type="number" placeholder="quantity" min="20" name="product_quantity"  class="qty">
			<input type="hidden" name="product_name" value="<?php echo $fetch_products['name'];?>">
			<input type="hidden" name="product_description" value="<?php echo $fetch_products['description'];?>">
			<input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?>">
			<input type="hidden" name="product_image" value="<?php echo $fetch_products['image'];?>"><br>
			<p>Available: <span style="color:<?php if ($fetch_products ['quantity'] >= '1'){echo 'in stock';}else{echo'out of stoch';}?>;"><?php echo $fetch_products['quantity'];?></span></p> 
			<input type="submit" value="add to cart" name="add_to_cart" class="btn">
			</form>
			<?php
			}
		      }else{
			echo '<p class="empty"> no producthas been added yet!!</p>';
		  }
			?>

		</div>

	</section>
	

	<!--about section -->
	<section class="about" id="about">
	 <h1 class="heading"> <span>about</span> us</h1>
		<div class="flex">
			<div class="image">
				<img src="image/about.jpg" alt="">
			</div>
			<div class="content">
				<h3>Gasolina Patner</h3>
				<p>Morbi sit amet mollis est. Nulla facilisi. Phasellus ultrices faucibus leo a vulputate. 
				In nec imperdiet tellus, ac accumsan ipsum. Integer dictum vitae sem vel vehicula. Suspendisse potenti.
				 Morbi elit lorem, congue a ipsum sed, cursus commodo est. 
				Vivamus finibus pharetra purus, quis dignissim dui pretium tempus.</p>
				<a href="about.php" class="btn">read more</a>

			</div>

		</div>

	</section>

	<!-- contact section -->
	<section class="cus-contact" id="contact">
	<h1 class="heading"> <span>contact</span> us</h1>
	<div class="content">
	<h3>Lets Have a Talk..</h3>
	<p>We are here... <br>
	Our door is always open for a good cup of coffee!!
	</p>
	<a href="contact.php" class="btn">contact us</a>

	</div>
	</section>

	









<?php include'footer.php'; ?>

   
	<script src="script.js"></script>
</body>
</html>