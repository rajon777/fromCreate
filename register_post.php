<?php
session_start();
require 'db.php';

$fast_name = $_POST['fast_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$comments = $_POST['comments'];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);
$confirm_password = $_POST['confirm_password'];
$country = $_POST['country'];
$gender = $_POST['gender'];

$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spl = preg_match('@[#,$,%,^,&,*]@', $password);

$flag = false;
if (empty($fast_name)) {
    $flag = true;
    $_SESSION['fname_err'] = 'Please Enter Your Fast Name';
} else {
    $_SESSION['fast_name'] = $fast_name;
}
if (empty($last_name)) {
    $flag = true;
    $_SESSION['lname_err'] = 'Please Enter The Last Name';
} else {
    $_SESSION['last_name'] = $last_name;
}
if (empty($email)) {
    $flag = true;
    $_SESSION['email_err'] = 'Please Enter the Email';
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = true;
        $_SESSION['email_err'] = 'Please Enter the Valid Email';
        $_SESSION['email'] = $email;
    } else {
        $_SESSION['email'] = $email;
    }
}
if (empty($comments)) {
    $flag = true;
    $_SESSION['cmmt_err'] = 'Please Enter the Comment';
} else {
    $_SESSION['comments'] = $comments;
}
if (empty($password)) {
    $flag = true;
    $_SESSION['pass_err'] = 'Please Enter the Password';
} else {
    if (!$upper || !$lower || !$number || !$spl || strlen($password) < 8) {
        $flag = true;
        $_SESSION['pass_err'] = 'Please enter one uppercase leter one lowecase letter one number one special character and mudst be at least 8 charaters';
    } else {
        $_SESSION['password'] = $password;
    }
}
if (empty($confirm_password)) {
    $flag = true;
    $_SESSION['compass_err'] = 'Please Enter the Confirm Password';
} else {
    if ($password != $confirm_password) {
        $flag = true;
        $_SESSION['compass_err'] = 'Please Enter the Correct Password';
    } else {
        $_SESSION['confirm_password'] = $confirm_password;
    }
}
if (empty($country)) {
    $flag = true;
    $_SESSION['cty_err'] = 'Please Select the country';
} else {
    $_SESSION['country'] = $country;
}
if (empty($gender)) {
    $flag = true;
    $_SESSION['gen_err'] = 'Please Select the gender';
} else {
    $_SESSION['gender'] = $gender;
}

if ($flag) {
    header('location:register.php');
} else {
    // value insert of database
       $insert = "INSERT INTO users (fast_name, last_name, email, comments, password, country, gender) VALUE ('$fast_name' , '$last_name', '$email', '$comments', '$after_hash', '$country', '$gender')";
       mysqli_query($db_connection, $insert);
       $_SESSION['success'] = 'User Registation successfull!';
       header('location:users/users.php');


}
?>

