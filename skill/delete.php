<?php require '../db.php';
session_start();
$id = $_GET['id'];
$select = "SELECT * FROM skills WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc_res = mysqli_fetch_assoc($select_res);
if ($after_assoc_res['stutas'] == 1) {
    $_SESSION['not_del'] = 'Skills delete Please active to deactive';
    header('location:skill.php');
} else {
    $delete = "DELETE FROM skills WHERE id = $id";
    mysqli_query($db_connection, $delete);
    $_SESSION['success'] =  'Skill Deleted Successfully';
    header('location:skill.php');
}
