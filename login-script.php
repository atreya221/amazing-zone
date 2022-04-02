<?php
require 'includes/common.php';
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con,md5($_POST['password']));
$submit_query = "SELECT * FROM users WHERE users.email='$email' AND users.password='$password'";
$submit_query_result = mysqli_query($con , $submit_query) or die(mysqli_error($con));
$num_rows = mysqli_num_rows($submit_query_result);
if($num_rows == 0)
{
    header("location: login.php?login_error=Wrong email ID or password");
}
else {
    $row = mysqli_fetch_array($submit_query_result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['user_id'] = $row['user_id'];
    $user_id = $row['user_id'];
    $role_id = $row['role_id'];
    $_SESSION['role'] = $role_id;
    echo $role_id;
    if($role_id == 0)
    {
        $select_query = "SELECT * FROM customers WHERE user_id = $user_id";
        $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
        $row = mysqli_fetch_array($select_query_result);
        $_SESSION['specific_id'] = $row['customer_id'];
    }
    if($role_id == 1)
    {
        $select_query = "SELECT * FROM suppliers WHERE user_id = $user_id";
        $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
        $row = mysqli_fetch_array($select_query_result);
        $_SESSION['specific_id'] = $row['supplier_id'];
    }
    header('location: index.php');
}

?>
