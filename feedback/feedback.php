<?php
session_start();
require '../db.php';
require '../includes/header.php';

$select_tes = "SELECT * FROM feedbacks";
$select_tes_res =  mysqli_query($db_connection, $select_tes);

?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3 bg-primary">
                <h3 class="text-white">All Feedback List</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['delete'])){ ?>
                    <div class="text-green"><?=$_SESSION['delete']?></div>
                <?php } unset($_SESSION['delete']) ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Categroy</th>
                            <th>Image</th>
                            <th>Feedback</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_tes_res as $index => $testimonial) { ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $testimonial['name'] ?></td>
                                <td><?= $testimonial['category'] ?></td>
                                <td>
                                    <?php if ($testimonial['image'] == null) { ?>
                                        <div class="text-danger" style="width: 100px; height: 100px; text-align:center; line-height: 100px; background:#ddd; border-radius:50%; font-size: 40px;"><?=substr($testimonial['name'],0,1)?></div>
                                    <?php } else { ?>
                                        <img src="../uploads/feedback/<?= $testimonial['image'] ?>" alt="" width="100">

                                    <?php } ?>
                                </td>

                                <td><?= $testimonial['feedback'] ?></td>
                                <td>
                                    <a href="delete.php?id=<?= $testimonial['id'] ?>" class="btn text-danger shadow del "><i class="fa fa-trash"></i></a>
                                </td>

                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>