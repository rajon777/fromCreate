<?php
session_start();
require '../db.php';
$id = $_POST['id'];
$title = $_POST['title'];
$category = $_POST['category'];
$image = $_FILES['image'];

$select_protfolio = "SELECT image FROM protfolios WHERE id=$id";
$select_protfolio_res = mysqli_query($db_connection, $select_protfolio);
$select_protfolio_assoc = mysqli_fetch_assoc($select_protfolio_res);

if ($image['name'] != '') {
    $after_explode = explode('.', $select_protfolio_assoc['image']);
    $extension = end($after_explode);
    $allowed_extension = array('png', 'jpeg', 'jpg');

    if (in_array($extension, $allowed_extension)) {
        if ($header_logo['size'] <= 1000000) {
            $delete_from = '../uploads/protfolio/' . $select_protfolio_assoc['image'];
            unlink($delete_from);
            $file_name = uniqid() . '.' . $extension;
            $new_location = '../uploads/protfolio/' . $file_name;
            move_uploaded_file($image['tmp_name'], $new_location);

            $update = "UPDATE protfolios SET title='$title', category = '$category', image = '$file_name' WHERE id= '$id'";
            mysqli_query($db_connection, $update);
            $_SESSION['update'] = 'Portfolio Update successfuly';
            header('location:protfolio.php');
        } else {
            $_SESSION['size'] = 'Logo Size must be not greater than 1MB';
            header('location:edit.php?id=' . $id);
        }
    } else {
        $_SESSION['format'] = 'Only png jpeg and jpg Format are allowed';
        header('location:logo.php?id=' . $id);
    }
}
