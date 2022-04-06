<?php
    include 'includes/common.php';
    if(!isset($_SESSION['email'])) {
        header('location: index.php');
    }
    $user_id = $_SESSION['user_id'];
    $role_id = $_SESSION['role'];
    if ( $role_id == 0) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $address = $_POST['address'];
        echo $name;
        $update_user_query = "UPDATE users SET name = '$name', email = '$email' WHERE user_id = $user_id";
        $update_customer_query = "UPDATE customers SET contact_no = '$contact_no', city = '$city', country = '$country', address = '$address' WHERE user_id = $user_id";
        $update_user_query_result = mysqli_query($con , $update_user_query) or die(mysqli_error($con));
        $update_customer_query_result = mysqli_query($con , $update_customer_query) or die (mysqli_error($con));
        header("location: settings.php?update_msg=User details updated successfully!");
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact'];
        $license = $_POST['license'];
        $address = $_POST['address'];
        echo $name;
        $update_user_query = "UPDATE users SET name = '$name', email = '$email' WHERE user_id = $user_id";
        $update_supplier_query = "UPDATE suppliers SET contact_no = '$contact_no', license = '$license', address = '$address' WHERE user_id = $user_id";
        $update_user_query_result = mysqli_query($con , $update_user_query) or die(mysqli_error($con));
        $update_supplier_query_result = mysqli_query($con , $update_supplier_query) or die (mysqli_error($con));
        header("location: settings.php?update_msg=User details updated successfully!");
    }

?>

    