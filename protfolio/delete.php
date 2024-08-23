<?php
require '../db.php';
session_start();
$id = $_GET['id'];

$select = "SELECT * FROM protfolios WHERE id=$id";
$select_protfolio = mysqli_query($db_connection, $select);
$after_assoc_res = mysqli_fetch_assoc($select_protfolio);
if ($after_assoc_res['status'] == 1) {
    $_SESSION['not_del'] = 'Protfolios delete Please active to deactive';
    header('location:protfolio.php');
} else {
    $delete = "DELETE FROM protfolios WHERE id = $id";
    mysqli_query($db_connection, $delete);
    $_SESSION['delete'] = 'Protfolio delete Successfuly';
    header('location:protfolio.php');
}
