<?php
require '../db.php';
session_start();
$id = $_GET['id'];

$select = "SELECT image FROM feedbacks WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_accos_res = mysqli_fetch_assoc($select_res);


if ($after_accos_res['image'] != null) {
    $delete_form = '../uploads/feedback/'.$after_accos_res['image'];
    unlink($delete_form);
    $_SESSION['delete'] = 'Feedback delete Successfuly';
    header('location:feedback.php');
}

$delete = "DELETE FROM feedbacks WHERE id = $id";
mysqli_query($db_connection, $delete);
$_SESSION['delete'] = 'Feedback delete Successfuly';
header('location:feedback.php');
