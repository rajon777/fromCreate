<?php
session_start();
require '../db.php';
$id = $_POST['id'];
$skill_name = $_POST['skill_name'];
$skill_percentage = $_POST['skill_percentage'];
$update = "UPDATE skills SET skill_name='$skill_name', skill_percentage='$skill_percentage' WHERE id=$id";
mysqli_query($db_connection, $update);
$_SESSION['edit'] = 'Skill edit success';
header('location:skill.php');
?> 