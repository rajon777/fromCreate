<?php
session_start();
require '../db.php';

$title = $_POST['title'];
$desp = $_POST['desp'];

$insert = "INSERT INTO services(title,desp)VALUES('$title', '$desp')";
mysqli_query($db_connection, $insert);
$_SESSION['service'] = 'New service add success';
header('location:service.php');


?>