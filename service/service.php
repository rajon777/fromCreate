<?php
require '../db.php';
include '../includes/header.php';

$select = "SELECT * FROM services";
$select_res = mysqli_query($db_connection, $select);
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header p-3 bg-primary">
                <div class="text-white">Service List</div>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="text-green"><?= $_SESSION['success'] ?></div>
                <?php }
                unset($_SESSION['success']) ?>

                <?php if (isset($_SESSION['status'])) { ?>
                    <div class="text-green"><?= $_SESSION['status'] ?></div>
                <?php }
                unset($_SESSION['status']) ?>

                <?php if (isset($_SESSION['update'])) { ?>
                    <div class="text-green"><?= $_SESSION['update'] ?></div>
                <?php }
                unset($_SESSION['update']) ?>

                <?php if (isset($_SESSION['service'])) { ?>
                    <div class="text-green"><?= $_SESSION['service'] ?></div>
                <?php }
                unset($_SESSION['service']) ?>

                <?php if (isset($_SESSION['ser_not_del'])) { ?>
                    <div class="text-green"><?= $_SESSION['ser_not_del'] ?></div>
                <?php }
                unset($_SESSION['ser_not_del']) ?>

                <form action="service_post.php" method="POST">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Title name</th>
                            <th>Title description</th>
                            <th>Stutas</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_res as $index => $service) { ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $service['title'] ?></td>
                                <td><?= $service['desp'] ?></td>
                                <td>
                                    <a href="service_stutas.php?id=<?= $service['id'] ?>" class="badge badge-<?= ($service['status'] == 1 ? 'success' : 'light') ?>"><?= ($service['status'] == 1 ? 'Active' : 'Deactive') ?></a>
                                </td>
                                <td width="200">
                                    <a href="edit.php?id=<?= $service['id'] ?>" class="btn btn-primary shadow del "><i class="fa fa-pencil"></i></a>

                                    <a data-link="delete.php?id=<?= $service['id'] ?>" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow del "><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header p-3 bg-primary">
                <div class="text-white">Add New Service</div>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['service'])) { ?>
                    <div class="text-green"><?= $_SESSION['service'] ?></div>
                <?php }
                unset($_SESSION['service']) ?>
                <form action="service_post.php" method="POST">
                    <div class="mb-2">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Description</label>
                        <textarea name="desp" id="" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Add Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include '../includes/footer.php'; ?>


<!-- Module -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are You Sure Wnat to Delete this User?</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">No don't</button>
                <button type="button" class="btn btn-primary yes">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- Module end -->
<script>
    $('.del').click(function() {
        // alert();
        var link = $(this).attr('data-link');
        $('.yes').click(function() {
            window.location.href = link;
        })
        // alert(link);
    })

    // $('.del').click(function(){
    //     var link = $(this).attr('data-link');
    //     $('.yes').click(function(){
    //         window.location.href = link;
    //     })
    // })
</script>


