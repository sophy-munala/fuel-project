<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="landing.css">
        

    <title>Landing Page</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><span class="text warning">Gasoline</span> Patner</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#how it works">How it Works</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Facts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Asked Questions</a>
        </li>
         
      </ul>
      
    </div>
  </div>
</nav>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  
    <div class="carousel-item active">
      <img src="image/f.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
      <h3>Best<span> automotive & fuel delivery </span>at your door step</h3>
		<p>We source our fuel from the best and trusted fuel company near you</p>
         <a href="customer_login.php" class="btn">Discover More</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/photo 2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
      <h3>best<span> automotive & fuel delivery </span>at your door step</h3>
		<p>We deliver any type of fuel of your liking</p>
         <a href="customer_login.php" class="btn">Discover More</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/photo 1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
       <h3>best<span> automotive & fuel delivery </span>at your door step</h3>
		<p>With free delivery services 24/7</p>
         <a href="customer_login.php" class="btn">Discover More</a>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/photo 3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
      <h3>best<span> automotive & fuel delivery </span>at your door step</h3>
		<p>We source our fuel from the best and trusted fuel company near you</p>
         <a href="customer_login.php" class="btn">Discover More</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!--how it works section-->
<section id="how it works" class="works">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center pb-5">
                    <h2>How it works</h2>
                    <p>Make your orders and get fuel delivered at your door step</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md col-lg-4">
                <div class="card text-white text-center bg-dark pb-2">
                    <div class="class-body">
                    <i class="bi bi-geo-alt-fill"></i>
                    <h3 class="card-title">Tell us where you are</h3>
                    <p class="lead">We come to our customers</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md col-lg-4">
                <div class="card text-white text-center bg-light pb-2">
                    <div class="class-body">
                    <i class="bi bi-fuel-pump" style="color: black;"></i>
                    <h3 class="card-title" style="color: black;">Enter the type of fuel</h3>
                    <p class="lead" style="color: black;">all types of fuels are available</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md col-lg-4">
                <div class="card text-white text-center bg-dark pb-2">
                    <div class="class-body">
                    <i class="bi bi-speedometer2"></i>
                    <h3 class="card-title">Enter the quantity</h3>
                    <p class="lead">with a minimum of 10 Litres of fuel</p>
                </div>
              </div>  
           <br>
            </div>
            <div class="col-12 col-md col-lg-4">
                <div class="card text-white text-center bg-light pb-2">
                    <div class="class-body">
                    <i class="bi bi-basket2-fill" style="color: black;"></i>
                    <h3 class="card-title" style="color: black;">Make your orders with us</h3>
                    <p class="lead" style="color: black;">all the variety of fuels</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md col-lg-4">
                <div class="card text-white text-center bg-dark pb-2">
                    <div class="class-body">
                    <i class="bi bi-credit-card-2-front"></i>
                    <h3 class="card-title">Make your payments</h3>
                    <p class="lead">pay for the ordered goods <br> the payment method of your liking</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-md col-lg-4">
                <div class="card text-white text-center bg-light pb-2">
                    <div class="class-body">
                    <i class="bi bi-truck" style="color: black;"></i>
                    <h3 class="card-title" style="color: black;">Delivery of products</h3>
                    <p class="lead" style="color: black;">Your products are delivered at your specified time</p>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

<!-- services section-->
<section class="service" id="services">
		<h1 class="heading">our <span> services</span></h1>
		  <div class="box-container">
			  <div class="box">
				  <img src="image/lorry.jpg">
				    <h3>Free delivery</h3>
				       <p>we offer free delivery services in places around Trans-nzoia couty
				     <span class="read-more-text">
				Morbi sit amet mollis est. Nulla facilisi. Phasellus ultrices faucibus leo a vulputate. 
				In nec imperdiet tellus, ac accumsan ipsum. Integer dictum vitae sem vel vehicula. Suspendisse potenti.
				 Morbi elit lorem, congue a ipsum sed, cursus commodo est. 
				Vivamus finibus pharetra purus, quis dignissim dui pretium tempus.
				</span>
			       </p>
				     <p class="read-more-btn">read more...</p>
			  </div>

			<div class="box">
				<img src="image/wash.png">
				   <h3>Car wash services</h3>
				     <p>we offer free delivery services in places aroung Trans-nzoia couty</p>
				       <span class="read-more-text">
				Morbi sit amet mollis est. Nulla facilisi. Phasellus ultrices faucibus leo a vulputate. 
				In nec imperdiet tellus, ac accumsan ipsum. Integer dictum vitae sem vel vehicula. Suspendisse potenti.
				 Morbi elit lorem, congue a ipsum sed, cursus commodo est. 
				Vivamus finibus pharetra purus, quis dignissim dui pretium tempus.
				      </span>
				   <p class="read-more-btn">read more...</p>
			</div>
      
			<div class="box">
				<img src="image/tyre.jpg">
				<h3>Tyre Change</h3>
				<p>we change tyre and check pressure for you</p>
				<span class="read-more-text">
				Morbi sit amet mollis est. Nulla facilisi. Phasellus ultrices faucibus leo a vulputate. 
				In nec imperdiet tellus, ac accumsan ipsum. Integer dictum vitae sem vel vehicula. Suspendisse potenti.
				 Morbi elit lorem, congue a ipsum sed, cursus commodo est. 
				Vivamus finibus pharetra purus, quis dignissim dui pretium tempus.
				</span>
				<p class="read-more-btn">read more...</p>
			</div>
			<div class="box">
				<img src="image/pay.jpg">
				<h3>Easy payment</h3>
				<p>we have several methods of payment</p>
				<span class="read-more-text">
				Morbi sit amet mollis est. Nulla facilisi. Phasellus ultrices faucibus leo a vulputate. 
				In nec imperdiet tellus, ac accumsan ipsum. Integer dictum vitae sem vel vehicula. Suspendisse potenti.
				 Morbi elit lorem, congue a ipsum sed, cursus commodo est. 
				Vivamus finibus pharetra purus, quis dignissim dui pretium tempus.
				</span>
				<p class="read-more-btn">read more...</p>
			</div>
		</div>
	</section>

    

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

   
  </body>
</html>