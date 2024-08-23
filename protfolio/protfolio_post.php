<?php
session_start();
require '../db.php';

$title = $_POST['title'];
$category = $_POST['category'];
$image = $_FILES['image'];

$after_explode = explode('.', $image['name']);
$extension = end($after_explode);
// echo $extension;
$allow_extension = array('png', 'jpg', 'jpeg');
if (in_array($extension, $allow_extension)) {
    if ($image['size'] <= 1000000) {
        $file_name = uniqid() . '.' . $extension;
        // echo $file_name;
        $new_location = '../uploads/protfolio/' . $file_name;
        move_uploaded_file($image['tmp_name'], $new_location);

        $insert = "INSERT INTO protfolios(title, category, image)VALUES('$title', '$category', '$file_name')";
        mysqli_query($db_connection, $insert);
        $_SESSION['protfolio'] = 'New protfolio Added';
        header('location:protfolio.php');
    } else {
        $_SESSION['image'] = 'Image size max 1MB';
        header('location:protfolio.php');
    }
} else {
    $_SESSION['image'] = 'Only png jpg and jpeg allow';
    header('location:protfolio.php');
}
