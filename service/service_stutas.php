<?php
session_start();
require '../db.php';
$id = $_GET['id'];
// echo $id;
$select = "SELECT status FROM services WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$afer_assoc = mysqli_fetch_assoc($select_res);
if ($afer_assoc['status'] == 1) {
    $update = "UPDATE services SET status=0 WHERE id= $id";
    mysqli_query($db_connection, $update);
    $_SESSION['status'] = 'services status Deactived';
    header('location:service.php');
} else {
    $update = "UPDATE services SET status=1 WHERE id= $id";
    mysqli_query($db_connection, $update);
    $_SESSION['service'] = 'Status Actived';
    header('location:service.php');
}
