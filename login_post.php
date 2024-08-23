<?php
session_start();
require 'db.php';
$email = $_POST['email'];
$password = $_POST['password'];

$flag = false;
if (empty($email)) {
    $flag = true;
    $_SESSION['email'] = 'Please Enter the email';
} else {
    $scelect = "SELECT COUNt(*) as total FROM users WHERE email = '$email'";
    $scelect_res = mysqli_query($db_connection, $scelect);
    $after_assoc = mysqli_fetch_assoc($scelect_res);
    // echo $after_assoc['total'];
    // print_r($after_assoc);
    if ($after_assoc['total'] != 1) {
        $flag = true;
        $_SESSION['email'] = 'Email dons not exists';
    }
}
if (empty($password)) {
    $flag = true;
    $_SESSION['password'] = 'Please Enter the email';
} else {
    $scelect = "SELECT * FROM users WHERE email = '$email'";
    $scelect_res = mysqli_query($db_connection, $scelect);
    $after_assoc = mysqli_fetch_assoc($scelect_res);
    // print_r($after_assoc);
    // echo $after_assoc['password'];
    if (!password_verify($password, $after_assoc['password'])) {
        $flag = true;
        $_SESSION['password'] = 'Wrong Password';
    } else {
        $_SESSION['login_comfram'] = 'Login comfram';
        $_SESSION['logged_id'] = $after_assoc['id'];
        header('location:dashbord.php');
    }
}
if ($flag) {
    header('location:login.php');
}
?>


<!-- time 27 minit -->