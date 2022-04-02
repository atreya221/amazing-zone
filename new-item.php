<?php
    require 'includes/common.php';
    if(isset($_SESSION['email']))
    {
        header('location : index.php');
    }
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


		<?php include 'includes/header.php'; ?>

		<div class="container container-modi">
			<div class="row row-style">
				<div class="col-xs-offset-2 col-xs-8 col-md-offset-3 col-md-6">
                    <form method="post" action="item-add.php?cat=<?php echo $_GET['cat'] ?>">
					<center><h2><strong>Add New Item</strong></h2></center>
					<div class="form-group">                     
                        <input type="text" name="product_name" placeholder="Product Name" class="form-control" required="True">
					</div>
					<div class="form-group">
                        <input type="text" name="brand" placeholder="Brand" class="form-control" required="True">
					</div>
					<div class="form-group">
                        <input type="text" name="quantity" placeholder="Quantity Available" class="form-control" required="True">
					</div>
					<div class="form-group">
                        <input type="text" name="original_price" placeholder="Original Price" class="form-control" required="True">
					</div>
					<div class="form-group">
                        <input type="text" name="discounted_price" placeholder="Discounted Price" class="form-control" required="True">
					</div>
					<div class="form-group">
                        <textarea name="product_info" placeholder="Product Description" class="form-control" required="True"></textarea>
					</div>
					<center>
						<div class="form-group">
							<input type="submit" value="Submit" class="btn btn-primary">
						</div>
					</center>
                </form>
				</div>
			</div>
                    <div class="push"></div>
		</div>
		

		<?php include 'includes/footer.php'; ?> 
	</body>
</html>
