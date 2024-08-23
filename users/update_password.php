<?php
session_start();
require '../db.php';
$user_id = $_POST['user_id'];
$select = "SELECT * FROM users WHERE id = $user_id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$after_hash = password_hash($new_password, PASSWORD_DEFAULT);
$comfirm_password = $_POST['comfirm_password'];

$flag = false;

if (empty($current_password)) {
    $flag = true;
    $_SESSION['crn_pass_err'] = 'Please Enter the Current Password';
} else {
    if (!password_verify($current_password, $after_assoc['password'])) {
        $flag = true;
        $_SESSION['crn_pass_err'] = 'Please Enter the Correct Current Password';
    }
}
if (empty($new_password)) {
    $flag = true;
    $_SESSION['nw_pass_err'] = 'Please Enter the New Password';
}
if (empty($comfirm_password)) {
    $flag = true;
    $_SESSION['cfm_pass_err'] = 'Please Enter the Comfrim Password';
} else {
    if ($new_password != $comfirm_password) {
        $flag = true;
        $_SESSION['cfm_pass_err'] = 'Password and Confrim Password Not Match';
    }
}
if ($flag) {
    header('location:profile.php');
}
else{
    $update = "UPDATE users SET password = '$after_hash' WHERE id = $user_id";
    mysqli_query($db_connection, $update);
    $_SESSION['pass_update']= 'Password Update Success';
    header('location:profile.php');
}
?>
<!-- time 20 minit -->