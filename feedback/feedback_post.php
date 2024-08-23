<?php

session_start();
require '../db.php';
$name = $_POST['name'];
$category = $_POST['category'];
$feedback = $_POST['feedback'];
$image = $_FILES['image'];

if ($image['name'] == '') {
    $insert = "INSERT INTO feedbacks(name, category, feedback)VALUES('$name', '$category', '$feedback')";
    mysqli_query($db_connection, $insert);
    $_SESSION['feedback'] = 'Feedback sent successfully';
    header('location:../index.php#feedback');
} else {
    $explode = explode('.', $image['name']);
    $extenion = end($explode);
    $allow_extenion = array('png', 'jpg');
    if (in_array($extenion, $allow_extenion)) {
        if ($image['size'] <= 1000000) {
            $file_name = uniqid(). '.' .$extenion;
            $new_location = '../uploads/feedback/' .$file_name;
            move_uploaded_file($image['tmp_name'], $new_location);

            $insert = "INSERT INTO feedbacks(name, category, feedback, image)VALUES('$name', '$category', '$feedback', '$file_name')";
            mysqli_query($db_connection, $insert);
            $_SESSION['feedback'] = 'Feedback sent successfully';
            header('location:../index.php#feedback');
        } else {
            $_SESSION['feedback_size'] = 'Image size max Must be 1MB';
            header('location:../index.php#feedback');
        }
    } else {
        $_SESSION['feedback_err'] = 'Only png and jpg format';
        header('location:../index.php#feedback');
    }
}
