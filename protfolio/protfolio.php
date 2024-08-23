<?php
require '../db.php';
require '../includes/header.php';

$select = "SELECT * FROM protfolios";
$select_res_protfolio = mysqli_query($db_connection, $select);


?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header p-3 bg-primary">
                <h2 class="text-white">Protfolio List</h2>
            </div>
            <?php if (isset($_SESSION['active'])) { ?>
                <div class="text-green"><?= $_SESSION['active'] ?></div>
            <?php }
            unset($_SESSION['active']) ?>

            <?php if (isset($_SESSION['deactived'])) { ?>
                <div class="text-green"><?= $_SESSION['deactived'] ?></div>
            <?php }
            unset($_SESSION['deactived']) ?>

            <?php if (isset($_SESSION['delete'])) { ?>
                <div class="text-green"><?= $_SESSION['delete'] ?></div>
            <?php }
            unset($_SESSION['delete']) ?>

            <?php if (isset($_SESSION['update'])) { ?>
                <div class="text-green"><?= $_SESSION['update'] ?></div>
            <?php }
            unset($_SESSION['update']) ?>
            <?php if (isset($_SESSION['not_del'])) { ?>
                <div class="text-green"><?= $_SESSION['not_del'] ?></div>
            <?php }
            unset($_SESSION['not_del']) ?>
            <div class="card-body">
                <form action="" method="POST">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_res_protfolio as $index => $protfolio) { ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $protfolio['title'] ?></td>
                                <td><?= $protfolio['category'] ?></td>
                                <td>
                                    <img src="../uploads/protfolio/<?= $protfolio['image'] ?>" alt="" width="150">
                                </td>
                                <td>
                                    <a href="protfolio_status.php?id=<?= $protfolio['id'] ?>" class="badge badge-<?= ($protfolio['status'] == 1 ? 'success' : 'light') ?>"><?= ($protfolio['status'] == 1 ? 'Active' : 'Deactive') ?></a>
                                </td>
                                <td width="200">
                                    <a href="edit.php?id=<?= $protfolio['id'] ?>" class="btn btn-primary shadow del "><i class="fa fa-pencil"></i></a>

                                    <a data-link="delete.php?id=<?= $protfolio['id'] ?>" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow del "><i class="fa fa-trash"></i></a>
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
                <div class="h2 text-white">Add new Protfolio</div>
            </div>
            <?php if (isset($_SESSION['protfolio'])) { ?>
                <div class="text-green"><?= $_SESSION['protfolio'] ?></div>
            <?php }
            unset($_SESSION['protfolio']) ?>

            <div class="card-body">
                <form action="protfolio_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <div class="m-2">
                            <img alt="" id="blah" width="200">
                        </div>
                        <?php if (isset($_SESSION['image'])) { ?>
                            <div class="text-danger"><?= $_SESSION['image'] ?></div>
                        <?php }
                        unset($_SESSION['image']) ?>
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Add profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php'; ?>

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