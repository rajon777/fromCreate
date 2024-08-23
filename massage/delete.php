<?php
require '../db.php';
session_start();
$id = $_GET['id'];

$delete = "DELETE FROM massages WHERE id = $id";
mysqli_query($db_connection, $delete);
$_SESSION['massages'] = 'Massage delete Successfuly';
header('location:massage.php');
