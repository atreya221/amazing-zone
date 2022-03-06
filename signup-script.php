<?php
$role = $_POST['role'];

if(!strcmp($role, "Customer"))
{
    header('location: signup-customer.php');
}
else if(!strcmp($role, "Supplier"))
{   
    header('location: signup-supplier.php');
}
else
{
    header('location: signup.php'); 
}

?>