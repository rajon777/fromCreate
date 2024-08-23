<?php
session_start();
require '../db.php';
$id = $_SESSION['logged_id'];
$email = $_POST['email'];
$fast_name = $_POST['fast_name'];
$last_name = $_POST['last_name'];
$country = $_POST['country'];
$gender = $_POST['gender'];
$update = "UPDATE users SET fast_name='$fast_name', last_name = '$last_name',email='$email', country = '$country', gender = '$gender' WHERE id='$id'";
mysqli_query($db_connection, $update);
$_SESSION['success'] = 'Profile Info Updated';
header('location:profile.php');

?>
