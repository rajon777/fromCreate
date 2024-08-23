<?php require '../db.php';
session_start();
// $id = $_GET['id'];
// $delete = "DELETE FROM skills WHERE id = $id";
// mysqli_query($db_connection, $delete);

// header('location:skill.php');
$id = $_GET['id'];

$select_ser = "SELECT * FROM services WHERE id= $id";
$select_res = mysqli_query($db_connection, $select_ser);
$after_assoc_ser = mysqli_fetch_assoc($select_res);
if ($after_assoc_ser['status'] == 1) {
    $_SESSION['ser_not_del'] = 'Services delete Please Active to Deactived';
    header('location:service.php');
} else {
    $delete = "DELETE FROM services WHERE id= $id";
    mysqli_query($db_connection, $delete);
    $_SESSION['success'] =  'Service Deleted Successfully';
    header('location:service.php');
}
