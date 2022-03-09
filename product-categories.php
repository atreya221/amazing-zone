<?php
    require 'includes/common.php';
?>
<!DOCTYPE html>
<html>
  <head>
		<title>Amazing Zone</title>
		<meta charset="utf-8">
		<meta name='viewport' content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>

	<body>


		<?php 
                    include 'includes/header.php';
                ?>

		<div class="container">
                    <div class="jumbotron">
                        <h1>Welcome to our Amazing Zone!</h1>
                        <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
                    </div>
			
                    <div class="row text-center">
				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
                        <img src="images/1.jpg" alt="" class="img-responsive">
                        <div class="caption">
							<a href = "products.php?cat=1">
							<h3>Automobile</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { 
								/*
								if (check_if_added_to_cart(1)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=1" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/2.jpg" alt="" class="img-responsive">
						<div class="caption">
							<a href = "products.php?cat=2">
							<h3>Beauty Health & Fitness</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { /*
								if (check_if_added_to_cart(2)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=2" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/3.jpg" alt="" class="img-responsive">
						<div class="caption">
							<a href = "products.php?cat=3">
							<h3>Books</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else {/* 
								if (check_if_added_to_cart(3)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=3" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
							<?php } */} ?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/4.jpg" alt="" class="img-responsive">
						<div class="caption">
							<a href = "products.php?cat=4">
							<h3>Drinks</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { /*
								if (check_if_added_to_cart(4)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=4" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
							</a>
						</div>
					</div>
				</div>
                </div>

                

                <div class="row text-center">
				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/5.jpg" alt="" class="img-responsive">
						<div class="caption">
							<a href = "products.php?cat=5">
							<h3>Electronics</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { /*
								if (check_if_added_to_cart(5)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=5" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/6.jpg" alt="" class="img-responsive">
						<div class="caption">
						<a href = "products.php?cat=6">
							<h3>Food</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { /* 
								if (check_if_added_to_cart(6)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								}
								else { ?> 
							<a href="cart-add.php?id=6" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
						</a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/7.jpg" alt="" class="img-responsive">
						<div class="caption">
						<a href = "products.php?cat=7">
							<h3>Home</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { 
								/*
								if (check_if_added_to_cart(7)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=7" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
						</a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/8.jpg" alt="" class="img-responsive">
						<div class="caption">
						<a href = "products.php?cat=8">
							<h3>Kids' Fashion</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { /*
								if (check_if_added_to_cart(8)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=8" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
						</a>
						</div>
					</div>
				</div>
                    </div>

                    <div class="row text-center">
				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/9.jpg" alt="" class="img-responsive">
						<div class="caption">
						<a href = "products.php?cat=9">
							<h3>Men's Fashion</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { /*
								if (check_if_added_to_cart(9)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=9" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
						</a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/10.jpg" alt="" class="img-responsive">
						<div class="caption">
						<a href = "products.php?cat=10">
							<h3>Sports</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { /*
								if (check_if_added_to_cart(10)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=10" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
						</a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/11.jpg" alt="" class="img-responsive">
						<div class="caption">
						<a href = "products.php?cat=11">
							<h3>Toys & Baby Products</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { /*
								if (check_if_added_to_cart(11)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=11" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
						</a>
						</div>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="thumbnail">
						<img src="images/12.jpg" alt="" class="img-responsive">
						<div class="caption">
						<a href = "products.php?cat=12">
							<h3>Women's Fashion</h3>
							<?php if (!isset($_SESSION['email'])) { ?> 
							<p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
							<?php } else { /*
								if (check_if_added_to_cart(12)) {  
									echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>'; 
								} 
								else { ?> 
							<a href="cart-add.php?id=12" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> 
								<?php } */} ?>
						</a>
						</div>
					</div>
				</div>
                </div>
                </div>
		

		<?php include 'includes/footer.php'; ?>
	</body>
</html>