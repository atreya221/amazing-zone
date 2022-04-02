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
                <?php
                    $user_id = $_SESSION['user_id'];
                    $transaction_id = $_GET['id'];
                    $amt_payable = $_POST['amount'];
                    $select_user_query = "SELECT name FROM users WHERE user_id = $user_id";
                    $select_user_query_result = mysqli_query($con, $select_user_query) or die(mysqli_error($con));
                    $row = mysqli_fetch_array($select_user_query_result);
                    $name = $row['name'];
                ?>
		<div class="container container-modi">
			<div class="row row-style">
				<div class="col-xs-offset-2 col-xs-8 col-md-offset-3 col-md-6">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4>Payment Details</h4>
						</div>
						<div class="panel-body">
							<p>
                                <strong style = "size: 40px;"><font size = "+2"><?php echo $name ?></font></strong><br><br>
                                <form method="post" action="success.php">
                                <font size="+1">Amount Payable : &nbsp;&nbsp;&nbsp;&nbsp;Rs. <input type="text" size = "4" id="amount" name="amount" style="text-align:center; border-style:hidden;"  value = "<?php echo $amt_payable;?>"></font><br><br>
                                <font size="+1">Date of Purchase : &nbsp; &nbsp;<?php echo date("Y-m-d") ?></font><br><br>
                                <font size="+1">Payment Method : 
                                    <select style="margin-left: 20px;" id="method" name="method">
                                        <option value="Cash on delivery">Cash on delivery</option>
                                        <option value="Internet Banking">Internet Banking</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="Debit Card">Debit Card</option>
                                </select>
                                </font><br><br>
                                <center><input type="submit" value="Pay Now!" class="btn btn-primary"></center>
                                </form>
                            </p>
						</div>
					</div>
				</div>
			</div>
			<div class="push"></div>
		</div>
		

		<?php include 'includes/footer.php'; ?>
	</body>
</html>