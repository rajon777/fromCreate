<?php  
session_start();
require '../db.php';

$id = $_GET['id'];
$select = "SELECT status FROM protfolios WHERE id= $id";
$select_res = mysqli_query($db_connection, $select);
$after_accos_protfolio = mysqli_fetch_assoc($select_res);
if($after_accos_protfolio['status'] == 1){
 $update = "UPDATE protfolios SET status=0 WHERE id= $id";
 mysqli_query($db_connection, $update);
 $_SESSION['active'] = 'services status Deactived';
 header('location:protfolio.php');
}
else{
    $update = "UPDATE protfolios SET status=1 WHERE id= $id";
    mysqli_query($db_connection, $update);
    $_SESSION['deactived'] = 'services status Active';
    header('location:protfolio.php');


}



?>