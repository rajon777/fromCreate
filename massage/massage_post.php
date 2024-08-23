<?php
session_start();
require '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$massage = $_POST['massage'];

$insert = "INSERT INTO massages(name, email, subject, massage)VALUES('$name', '$email', '$subject', '$massage')";
mysqli_query($db_connection, $insert);
$_SESSION['massage'] = 'Massage send successfuly';
header('location:../index.php#contact');

?>