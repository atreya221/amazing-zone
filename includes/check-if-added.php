<?php

function check_if_added_to_cart($product_id)
{
    $con = mysqli_connect("localhost","root","","store","3308") or die(mysqli_error($con));
    $customer_id = $_SESSION['specific_id'];
    $select_query = "SELECT * FROM cart_items WHERE product_id = $product_id AND customer_id =$customer_id";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
    $num_rows = mysqli_num_rows($select_query_result);
    if($num_rows>=1) return 1;
    else return 0;
}
?>