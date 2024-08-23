<?php
require '../db.php';
require '../includes/header.php';
$message = "SELECT * FROM massages order by id desc";
$message_res = mysqli_query($db_connection, $message);
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3 bg-primary">
                <h3 class="text-white">All Messages</h3>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['massages'])) { ?>
                    <h3 class="text-info"><?= $_SESSION['massages'] ?></h3>
                <?php }
                unset($_SESSION['massages']) ?>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($message_res as $index => $massages) { ?>
                        <tr class="<?=$massages['status'] ==1?'':'bg-dark text-white'?>">
                            <td><?= $index + 1 ?></td>
                            <td><?= $massages['name'] ?></td>
                            <td><?= $massages['email'] ?></td>
                            <td><?= $massages['subject'] ?></td>
                            <td><?= $massages['massage'] ?></td>
                            <td width="200">
                                <a href="view.php?id=<?= $massages['id'] ?>" class="btn shadow del "><i class="fa fa-eye"></i></a>
                                <a href="delete.php?id=<?= $massages['id'] ?>" class="btn text-danger shadow del "><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>