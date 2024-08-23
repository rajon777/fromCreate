<?php
session_start();
require '../db.php';
$skill_name = $_POST['skill_name'];
$skill_percentage = $_POST['skill_percentage'];
$insert = "INSERT INTO skills(skill_name, skill_percentage)VALUES('$skill_name', '$skill_percentage')";
mysqli_query($db_connection, $insert);
$_SESSION['skill'] = 'New skill added successfuly'; 
header('location:skill.php');
