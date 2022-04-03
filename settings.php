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

        <div class="container-fluid">
    <div class="row">
      <main class="col-md-9 ml-sm-auto col-lg-12 px-md-4 py-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Form</li>
          </ol>
        </nav>
        <h1 style="margin-top:50px;">User Profile Page</h1>
        <section>
          <div class="container">
            <h4 style="line-height: 50px;"><strong>Details of User account</strong></h4>
            <?php
                $user_id = $_SESSION['user_id'];
                $select_user_query = "SELECT * FROM users WHERE user_id = $user_id";
                $select_user_query_result = mysqli_query($con , $select_user_query) or die(mysqli_error($con));
                $user_row = mysqli_fetch_array($select_user_query_result);
            ?>
            <form style="margin-top: 20px;" method="post" action="settings-script.php">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" value="<?php echo $user_row['name'] ?>" disabled>
                    </div>
                    <div class="form-group col-md-offset-2 col-md-4">
                        <label for="email">Email ID</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $user_row['email'] ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <?php if($_SESSION['role'] == 0) { 
                        $customer_id = $_SESSION['specific_id'];
                        $select_customer_query = "SELECT * FROM customers WHERE customer_id = $customer_id";
                        $select_customer_query_result = mysqli_query($con , $select_customer_query) or die(mysqli_error($con));
                        $customer_row = mysqli_fetch_array($select_customer_query_result);
                    ?>
                        <div class="form-group col-md-4">
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" id="contact" value="<?php echo $customer_row['contact_no']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" value="<?php echo $customer_row['city']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" value="<?php echo $customer_row['country']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" value="<?php echo $customer_row['address']; ?>" disabled>
                        </div>
                    </div>
                    <div class="push"></div>
                    <div class="form-row" id="edit-row">
                        <div class="form-group col-md-offset-5 col-md-2" id="edit">
                            <div class="btn btn-primary" onclick="editCustomer()">Edit Details</div>
                        </div>
                    </div>
                    <?php } else if($_SESSION['role'] == 1) { 
                        $supplier_id = $_SESSION['specific_id'];
                        $select_supplier_query = "SELECT * FROM suppliers WHERE supplier_id = $supplier_id";
                        $select_supplier_query_result = mysqli_query($con , $select_supplier_query) or die(mysqli_error($con));
                        $supplier_row = mysqli_fetch_array($select_supplier_query_result);
                    ?>
                        <div class="form-group col-md-4">
                            <label for="contact">Contact Number</label>
                            <input type="text" class="form-control" id="contact" value="<?php echo $supplier_row['contact_no']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-offset-2 col-md-4">
                            <label for="license">License ID</label>
                            <input type="text" class="form-control" id="license" value="<?php echo $supplier_row['license']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" value="<?php echo $supplier_row['address']; ?>" disabled>
                        </div>
                    </div>
                    <div class="push"></div>
                    <div class="form-row" id="edit-row">
                        <div class="form-group col-md-offset-5 col-md-2" id="edit">
                            <div class="btn btn-primary" onclick="editSupplier()">Edit Details</div>
                        </div>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </section>
        </main>
        </div>
    </div>
		
        <div class = "navbar navbar-inverse navbar-fixed-bottom">
            <?php include 'includes/footer.php'; ?>
        </div>
        <script>
            function editCustomer() {
                document.getElementById("address").disabled = false;
                document.getElementById("contact").disabled = false;
                document.getElementById("city").disabled = false;
                document.getElementById("country").disabled = false;
                document.getElementById("name").disabled = false;
                document.getElementById("email").disabled = false;
                $( "#edit" ).remove();
                newRow = 
                '<div class="form-group col-md-offset-5 col-md-1" id="submit"><input type="submit" value="Update" class="btn btn-primary"></div><div class="form-group col-md-1" id="cancel"><div class="btn btn-danger" onclick="restoreCustomer()">Cancel</div></div>';
                $('#edit-row').append(newRow);
            }
            function editSupplier() {
                document.getElementById("address").disabled = false;
                document.getElementById("contact").disabled = false;
                document.getElementById("license").disabled = false;
                document.getElementById("name").disabled = false;
                document.getElementById("email").disabled = false;
                $( "#edit" ).remove();
                newRow = 
                '<div class="form-group col-md-offset-5 col-md-1" id="submit"><input type="submit" value="Update" class="btn btn-primary"></div><div class="form-group col-md-1" id="cancel"><div class="btn btn-danger" onclick="restoreSupplier()">Cancel</div></div>';
                $('#edit-row').append(newRow);
            }
            function restoreCustomer() {
                document.getElementById("address").disabled = true;
                document.getElementById("contact").disabled = true;
                document.getElementById("city").disabled = true;
                document.getElementById("country").disabled = true;
                document.getElementById("name").disabled = true;
                document.getElementById("email").disabled = true;
                $( "#submit" ).remove();
                $( "#cancel" ).remove();
                newRow = '<div class="form-group col-md-offset-5 col-md-2" id="edit"><div class="btn btn-primary" onclick="editCustomer()">Edit Details</div></div>';
                $('#edit-row').append(newRow);
            }
            function restoreSupplier() {
                document.getElementById("address").disabled = true;
                document.getElementById("contact").disabled = true;
                document.getElementById("license").disabled = true;
                document.getElementById("name").disabled = true;
                document.getElementById("email").disabled = true;
                $( "#submit" ).remove();
                $( "#cancel" ).remove();
                newRow = '<div class="form-group col-md-offset-5 col-md-2" id="edit"><div class="btn btn-primary" onclick="editSupplier()">Edit Details</div></div>';
                $('#edit-row').append(newRow);
            }
        </script>
	</body>
</html>