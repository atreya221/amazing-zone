<?php
    include 'includes/common.php';
    $category_id = $_GET['cat'];
    $supplier_id = $_SESSION['specific_id'];

    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $stock = $_POST['quantity'];
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
    $original_price = $_POST['original_price'];
    $discounted_price = $_POST['discounted_price'];
    $product_info = mysqli_real_escape_string($con, $_POST['product_info']);

    $add_new_item_query = "INSERT INTO products (category_id, supplier_id, product_name, brand, stock, original_price, discounted_price, product_info) VALUES ($category_id, $supplier_id, '$product_name', '$brand', $stock, $original_price, $discounted_price, '$product_info')";
    $query_result = mysqli_query($con , $add_new_item_query) or die(mysqli_error($con));
    header("location: products.php?cat=".$_GET['cat']);
?>