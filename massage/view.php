<?php
session_start();
require '../db.php';
require '../includes/header.php';
$id = $_GET['id'];
$update = "UPDATE massages SET status = 1 WHERE id= $id";
mysqli_query($db_connection, $update);
$message_set = "SELECT * FROM massages WHERE id = $id";
$message_res_mass = mysqli_query($db_connection, $message_set);
$message_res_accos = mysqli_fetch_assoc($message_res_mass);

?>

<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header p-4 bg-primary">
                <h1 class="text-white">View User Messages</h1>
            </div>
            <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>Name</td>
                            <td><?=$message_res_accos['name']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$message_res_accos['email']?></td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td><?=$message_res_accos['subject']?></td>
                        </tr>
                        <tr>
                            <td>Massage</td>
                            <td><?=$message_res_accos['massage']?></td>
                        </tr>

                    </table>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>