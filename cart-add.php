<?php
    include 'includes/common.php';
    $item_id = $_GET['id'];
    $q = $_POST['quantity'];
    $user_id = $_SESSION['user_id'];
    $customer_id = $_SESSION['specific_id'];
    $add_to_cart_query = "INSERT INTO cart_items (customer_id, product_id, quantity) VALUES ($customer_id, $item_id, $q)";
    $query_result = mysqli_query($con , $add_to_cart_query) or die(mysqli_error($con));
    header("location: products.php?cat=".$_GET['cat']);
?>