<?php
session_start();
require '../db.php';

$select_about = "SELECT * FROM abouts";
$select_about_res = mysqli_query($db_connection, $select_about);
$after_assoc_about = mysqli_fetch_assoc($select_about_res);

$image = $_FILES['image'];
$after_explode = explode('.', $image['name']);
$extension = end($after_explode);
$allowed_extension = array('png', 'jpg');

if(in_array($extension, $allowed_extension)){
    if($image['size'] <= 1000000){
        $delete_from = '../uploads/image/'.$after_assoc_about['image'];
        unlink($delete_from);
        $file_name = uniqid().'.'.$extension;
        $new_location = '../uploads/image/'.$file_name;
        move_uploaded_file($image['tmp_name'], $new_location);

        $update = "UPDATE abouts SET image='$file_name'";
        mysqli_query($db_connection, $update);
        $_SESSION['image'] = 'About Image Updated';
        header('location:about.php');
    }
    else{
        $_SESSION['err'] = 'Logo Size must be not greater than 1MB';
        header('location:about.php');
    }
}
else{
    $_SESSION['err'] = 'Only png Format are allowed';
    header('location:about.php');
}

?>