<?php
    include 'includes/common.php';
    $item_id = $_GET['id'];
    $q = $_POST['quantity'];
    $user_id = $_SESSION['user_id'];
    $customer_id = $_SESSION['specific_id'];
    $select_query = "SELECT * FROM cart_items ORDER BY cart_id DESC LIMIT 1";
    $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
    $num_rows = mysqli_num_rows($select_query_result);
    $transaction_id = 1;
    if($num_rows!= 0) {
        $row = mysqli_fetch_array($select_query_result);
        $last_transaction_id = $row['transaction_id'];
        $transaction_id = $last_transaction_id + 1;
    }
    $select_query = "SELECT * FROM cart_items WHERE customer_id = $customer_id LIMIT 1";
    $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
    $num_rows = mysqli_num_rows($select_query_result);
    if($num_rows != 0)
    {
        $row = mysqli_fetch_array($select_query_result);
        $transaction_id = $row['transaction_id'];
    }

    $add_to_cart_query = "INSERT INTO cart_items (transaction_id, customer_id, product_id, quantity) VALUES ($transaction_id, $customer_id, $item_id, $q)";
    $query_result = mysqli_query($con , $add_to_cart_query) or die(mysqli_error($con));
    header("location: products.php?cat=".$_GET['cat']);
?>