<?php
session_start();
require '../db.php';
$id = $_GET['id'];
// echo $id;
$select = "SELECT stutas FROM skills WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$afer_assoc = mysqli_fetch_assoc($select_res);
if ($afer_assoc['stutas'] == 1) {
    $update = "UPDATE skills SET stutas=0 WHERE id= $id";
    mysqli_query($db_connection, $update);
    $_SESSION['stutas'] = 'Skill stutas Deactived';
    header('location:skill.php');
} else {
    $update = "UPDATE skills SET stutas=1 WHERE id= $id";
    mysqli_query($db_connection, $update);
    $_SESSION['stutas'] = 'Skill stutas Actived';
    header('location:skill.php');
}
