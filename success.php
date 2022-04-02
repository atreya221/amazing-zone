<?php
require 'includes/common.php';
if(!isset($_SESSION['email']))
{
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
		<title>Amazing Store</title>
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
                <?php
                    $user_id = $_SESSION['user_id'];
                    $customer_id = $_SESSION['specific_id'];
                    $amt_payable = $_POST['amount'];
                    $payment_method = $_POST['method'];
                    $insert_query = "INSERT INTO transactions (customer_id, amount_payable, payment_method) VALUES ($customer_id, $amt_payable, '$payment_method')";
                    $insert_query_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
                    $update_query = "SELECT * FROM cart_items WHERE customer_id = $customer_id";
                    $update_query_result = mysqli_query($con, $update_query);
                    while($row = mysqli_fetch_array($update_query_result))
                    {
                        $q = $row['quantity'];
                        $product_id = $row['product_id'];
                        $select_query = "SELECT * FROM products WHERE product_id = $product_id";
                        $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
                        $select_row = mysqli_fetch_array($select_query_result);
                        $quantity = $select_row['stock'] - $q;
                        $update_query = "UPDATE products SET stock = $quantity WHERE product_id = $product_id";
                        $update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));
                    }
                    $delete_query = "DELETE FROM cart_items WHERE customer_id = $customer_id";
                    $delete_query_result = mysqli_query($con, $delete_query);
                ?>
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4>Order Confirmed!</h4>
						</div>
						<div class="panel-body">
							<p>Your order is confirmed. Thank you for shopping
								with us. ​<a href="product-categories.php" class="text-info"><strong>Click here</strong> </a> to purchase any other item.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="push"></div>
		</div>
		

		<?php include 'includes/footer.php'; ?>
	</body>
</html>