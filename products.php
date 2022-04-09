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

        <?php include 'includes/header.php'; 
        include 'includes/check-if-added.php'; ?>
        <?php if($_SESSION['role'] == 0) {?>
		<div class="container container-modi">
			<div class="row row-style">
				<div>
					<table class="table table-hover table-bordered table-responsive text-center">
						
                        <?php 
                            $cat_id = $_GET['cat'];
    
                            $sel_query = "SELECT * FROM products WHERE category_id = $cat_id";
                            $sel_query_result = mysqli_query($con,$sel_query);
                            $num_rows = mysqli_num_rows($sel_query_result);
                            if(0) echo "<strong>Add items to the cart first!.</strong><br>";
                            else { 
                                $count = 1;
                            ?>
                                <table class="table table-hover table-bordered table-responsive text-center">
                            <tbody>
							<tr>
								<th style="width: 100px;"><center>Item Number</center></th>
								<th style="width: 100px;"><center>Item Name</center></th>
                                <th style="width: 100px;"><center>Brand</center></th>
                                <th style="width: 100px;"><center>Quantity Available</center></th>
                                <th style="width: 100px;"><center>Original Price</center> </th>
                                <th style="width: 100px;"><center>Discounted Price</center></th>
			 					<th style="width: 400px;"><center>Product Description</center></th>
                                <th style="width: 50px;"><center>Quantity</center></th>
                                <th style="width: 100px;"><center>Status</center></th>
							</tr>
                            <?php   while($row = mysqli_fetch_array($sel_query_result)) { echo $count;?>
                            <tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['brand']; ?></td>
                                <td><?php echo $row['stock']; ?></td>
								<td><?php echo "Rs. ", $row['original_price']; ?></td>
                                <td><?php echo "Rs. ", $row['discounted_price']; ?></td>
                                <td><?php echo $row['product_info']; ?></td>
                                <form method ="POST"  action = "cart-add.php?id=<?php echo $row['product_id'] ?>&cat=<?php echo $_GET['cat'] ?>">
                                <td>
                                <?php if (isset($_SESSION['email'])&& check_if_added_to_cart($row['product_id'])) 
                                {   
                                    $customer_id = $_SESSION['specific_id'];
                                    $product_id = $row['product_id'];
                                    $select_query = "SELECT * FROM cart_items WHERE customer_id = $customer_id AND product_id = $product_id";
                                    $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con)); 
                                    $row = mysqli_fetch_array($select_query_result);
                                    $quantity = $row['quantity'] ?>
                                    <label for="quantity"></label><input type="number" id="quantity" name="quantity" style="height: 32px;" size="6" min="1" value="<?php echo $quantity?>" disabled >
                                <?php }else{
                                    $product_id = $row['product_id'];
                                    $select_query = "SELECT * FROM products WHERE product_id = $product_id";
                                    $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con)); 
                                    $row = mysqli_fetch_array($select_query_result);
                                    $quantity = $row['stock']?>

                                    <label for="quantity"></label><input type="number" id="quantity" name="quantity" style="height: 32px;" size="6" min="1" max="<?php echo $quantity?>" value="1">
                                <?php }?>
                                </td>
                                <td>
                                  
                                <?php if (!isset($_SESSION['email'])) { ?> 
                                    <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p> 
                                    <?php } else { 
                                        if (check_if_added_to_cart($row['product_id'])) {?>

                                            <a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>
                                    <?php    } 
                                        else { ?> 
                                    
                                    <input type="submit" value="Add to cart" class="btn btn-primary">
                                <?php }} ?>
                                </td>
                                </form>
							</tr>
                            <?php  $count = $count+1; }?>
							
                            <?php }?>
						</tbody>
					</table>
				</div>
			</div>
                    <div class="push"></div>
		</div>
        <?php } else if($_SESSION['role'] == 1) {?>
            <div class="container container-modi">
			<div class="row row-style">
				<div>
					<table class="table table-hover table-bordered table-responsive text-center">
						
                        <?php 
                            $cat_id = $_GET['cat'];
                            $supplier_id = $_SESSION['specific_id'];
                            $sel_query = "SELECT * FROM products WHERE category_id = $cat_id AND supplier_id = $supplier_id";
                            $sel_query_result = mysqli_query($con,$sel_query);
                            $num_rows = mysqli_num_rows($sel_query_result);
                            if(0) echo "<strong>Add items to the cart first!.</strong><br>";
                            else { 
                                $count = 1;
                            ?>
                                <table class="table table-hover table-bordered table-responsive text-center">
                            <tbody>
							<tr>
								<th style="width: 100px;"><center>Item Number</center></th>
								<th style="width: 100px;"><center>Item Name</center></th>
                                <th style="width: 100px;"><center>Brand</center></th>
                                <th style="width: 100px;"><center>Quantity Available</center></th>
                                <th style="width: 100px;"><center>Original Price</center> </th>
                                <th style="width: 100px;"><center>Discounted Price</center></th>
                                <th style="width: 400px;"><center>Product Description</center></th>
                                <th style="width: 200px;"><center>Update</center></th>
							</tr>
                            <?php   while($row = mysqli_fetch_array($sel_query_result)) { ?>
                            <tr id="form-row">
                                <form method="post" action="item-update.php?id=<?php echo $row['product_id'] ?>&cat=<?php echo $_GET['cat'] ?>">
								<td><?php echo $count; ?></td>
								<td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['brand']; ?></td>
                                <td><input type="number" name="quantity" id="quantity-<?php echo $count ?>" style="height: 32px;" size="6" min="1" value="<?php echo $row['stock'];?>" autocomplete="off" disabled></td>
								<td><input type="number" id="original_price-<?php echo $count ?>" name="original_price" style="height: 32px;" size="6" min="1" value="<?php echo $row['original_price'];?>" autocomplete="off" disabled></td>
                                <td><input type="number" id="discounted_price-<?php echo $count ?>" name="discounted_price" style="height: 32px;" size="6" min="1" value="<?php echo $row['discounted_price'];?>" autocomplete="off" disabled></td>
                                <td><textarea type="text" id="product_info-<?php echo $count ?>" name="product_info" style="height: 32px;" autocomplete="off" disabled><?php echo $row['product_info'];?></textarea></td>
                                <td>
                                <div class="form-group col-md-6" id="edit-<?php echo $count ?>">
                                    <div class="btn btn-primary" id="edit-button-<?php echo $count ?>" onclick="edit(<?php echo $count; ?>)">Edit</div>
                                </div>
                                <div class="form-group col-md-6" id="update">
                                    <input type="submit" value="Update" id="update-button-<?php echo $count ?>" class="btn btn-primary" disabled>
                                </div>
                                </td>
                                </form>
							</tr>
                            <?php  $count = $count+1; }?>
							
                            <?php }?>
						</tbody>
					</table>
                    <center><button class="btn btn-primary" style="color:white;"><a href="new-item.php?cat=<?php echo $_GET['cat'] ?>" style="color:white;">New Item</a></button></center>
				</div>
			</div>
                    <div class="push"></div>
		</div>
        <?php } ?>
		
                <?php include 'includes/footer.php'; ?>
		<script>
            function edit(count) {
                document.getElementById("quantity-"+count).disabled = false;
                document.getElementById("original_price-"+count).disabled = false;
                document.getElementById("discounted_price-"+count).disabled = false;
                document.getElementById("product_info-"+count).disabled = false;
                document.getElementById("update-button-"+count).disabled = false;
                $( "#edit-button-"+count ).remove();
                newButton = '<div class="btn btn-danger" id="cancel-button-'+count+'" onclick="cancel(' + count + ')">Cancel</div>';
                $("#edit-"+count).append(newButton);
            }

            function cancel(count) {
                document.getElementById("quantity-"+count).disabled = true;
                document.getElementById("original_price-"+count).disabled = true;
                document.getElementById("discounted_price-"+count).disabled = true;
                document.getElementById("product_info-"+count).disabled = true;
                document.getElementById("update-button-"+count).disabled = true;
                $( "#cancel-button-"+count ).remove();
                newButton = '<div class="btn btn-primary" id="edit-button-'+count+'" onclick="edit('+count+')">Edit</div>';
                $("#edit-"+count).append(newButton);                
            }
        </script>
	</body>
</html>