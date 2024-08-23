<?php require '../db.php';
session_start();
$id = $_GET['id'];
$delete = "DELETE FROM users WHERE id = $id";
mysqli_query($db_connection, $delete);
$_SESSION['success'] =  'User Deleted Successfully';
header('location:users.php');


?>

