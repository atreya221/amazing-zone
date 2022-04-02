<?php
    include 'includes/common.php';
    $item_id = $_GET['id'];
    $quantity = $_POST['quantity'];
    $original_price = $_POST['original_price'];
    $discounted_price = $_POST['discounted_price'];
    $product_info = mysqli_real_escape_string($con, $_POST['product_info']);
    $update_query = "UPDATE products SET stock = $quantity, original_price = $original_price, discounted_price = $discounted_price, product_info = '$product_info'WHERE product_id = $item_id";
    $query_result = mysqli_query($con , $update_query) or die(mysqli_error($con));
    header("location: products.php?cat=".$_GET['cat']);
?>