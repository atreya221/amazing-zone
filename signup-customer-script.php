<?php
require 'includes/common.php';
$name = mysqli_real_escape_string($con,$_POST['name']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$contact = mysqli_real_escape_string($con,$_POST['contact']);
$address = mysqli_real_escape_string($con,$_POST['address']);
$city = mysqli_real_escape_string($con,$_POST['city']);
$country = mysqli_real_escape_string($con,$_POST['country']);
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
$regex_contact = "/^[0-9]{10}$/";
$email_error = '';
$password_error = '';
$contact_error = '';
if (!preg_match($regex_email, $email)) {
  header('location: signup-supplier.php?email_error=Enter a valid email ID');
}
if (strlen($password) < 6) {
  header('location: signup-supplier.php?password_error= Password is too short');
}
if (!preg_match($regex_contact, $contact)) {
  header('location: signup-supplier.php?contact_error= Enter a valid 10-digit phone no');
}
$password = mysqli_real_escape_string($con,md5($password));
//echo $password;
$select_query = "SELECT * FROM users WHERE users.email = '$email'";
$select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
$num_rows = mysqli_num_rows($select_query_result);
if($num_rows>0)
{
    header('location: signup-customer.php?email_error= User already exists');
}
else {
    $insert_user_query = "INSERT INTO users (role_id,email,password,name) VALUES(0,'$email','$password','$name')";

    $insert_user_query_result = mysqli_query($con, $insert_user_query);

    $user_id = mysqli_insert_id($con);

    echo $user_id;

    $insert_customer_query = "INSERT INTO customers (user_id,contact_no,city,country,address) VALUES($user_id,'$contact','$city','$country','$address')";

    $insert_customer_query_result = mysqli_query($con, $insert_customer_query) or die(mysqli_error($con));

    $customer_id = mysqli_insert_id($con);

    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
    $_SESSION['role'] = 0;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['specific_id'] = $customer_id;

    header('location: index.php');
}


