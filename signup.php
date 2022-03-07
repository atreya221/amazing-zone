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
        <style>
            .dropbtn {
                background-color: #04AA6D;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
            }
            .dropdown {
                position: relative;
                display: inline-block;
                }
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                /*min-width: 160px;*/
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
                }
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                }

            .dropdown-content a:hover {background-color: #ddd;}

            .dropdown:hover .dropdown-content {display: block;}

            .dropdown:hover .dropbtn {background-color: #3e8e41;}
        </style>
	</head>
	<body>
		<?php include 'includes/header.php'; ?>

		<div class="container container-modi">
			<div class="row row-style">
				<div class="col-xs-offset-2 col-xs-8 col-md-offset-3 col-md-6">
                    <form method="post" action="signup-script.php">
                    <center>
                    <div class="form-group">
                    <label for="role">Choose a role : </label>
                        <select id="role" name="role">
                            <option value="Customer">Customer</option>
                            <option value="Supplier">Supplier</option>
                        </select>
                    </div>

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
