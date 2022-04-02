<?php
require 'includes/common.php';
if(!isset($_SESSION['email'])) {
    header('location: login.php');
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
				<div class="col-xxs col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
					<table class="table table-hover table-bordered table-responsive text-center">
						
                        <?php 
                            $user_id = $_SESSION['user_id'];
                            $customer_id = $_SESSION['specific_id'];
                            $select_query = "SELECT * FROM cart_items WHERE customer_id = $customer_id";
                            $select_query_result = mysqli_query($con,$select_query);
                            $transaction_id = 0;
                            $num_rows = mysqli_num_rows($select_query_result);
                            if($num_rows==0) echo "<strong>Add items to the cart first!.</strong><br>";
                            else { 
                                $sum = 0;
                                $count = 1;
                            ?>
                            <table class="table table-hover table-bordered table-responsive text-center">
                            <tbody>
							<tr>
								<th><center>Item Number</center></th>
								<th><center>Item Name</center></th>
                                <th><center>Price per item</center></th>
                                <th><center>Quantity</center></th>
								<th><center>Total Price</center></th>
								<th style="width: 50px;"></th>
							</tr>
                            <?php while($row = mysqli_fetch_array($select_query_result)) { 
                                $product_id = $row['product_id'];
                                $transaction_id = $row['transaction_id'];
                                $select_product_query = "SELECT * FROM products WHERE product_id = $product_id";
                                $select_product_query_result = mysqli_query($con,$select_product_query);
                                $product_row = mysqli_fetch_array($select_product_query_result);
                            ?>
                            <tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $product_row['product_name']; ?></td>
                                <td>Rs. <?php echo $product_row['discounted_price']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
								<td>Rs. <?php $tot_price = $row['quantity'] * $product_row['discounted_price']; echo $tot_price; ?></td>
                                <td><?php echo"<a href='cart-remove.php?id={$row['cart_id']}' class='btn btn-danger'>Remove</a>";?></td>
							</tr>
                            <?php  $count = $count+1; 
                                   $sum = $sum+$tot_price;
                            }?>
							</tbody>
					</table>
                    <table class="table table-hover table-bordered table-responsive text-center">
                        <tbody>
							<tr>
								<td>Total Amount</td>
                                <form method = "POST" action = "confirm-order.php?id=<?php echo $transaction_id ?>">
                                <td>Rs. <input type="text" size = "5" id="amount" name="amount" style="text-align:center; border-style:hidden;" value = "<?php echo $sum;?>"></td>
                                <td style="width: 50px;"><input type="submit" class = "btn btn-block btn-success" value = "Confirm"></td>
                                <?php } ?>
                                </form>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
                    <div class="push"></div>
		</div>
		
                <?php include 'includes/footer.php'; ?>
		
	</body>
</html>