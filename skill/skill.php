<?php
require '../db.php';
require '../includes/header.php';
$skills = "SELECT * FROM skills";
$skills_res = mysqli_query($db_connection, $skills);
?>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary p-3">
                <h2 class="text-white">Skill List</h2>
            </div>
            <?php if (isset($_SESSION['stutas'])) { ?>
                <div class="text-green"><?= $_SESSION['stutas'] ?></div>
            <?php }
            unset($_SESSION['stutas']) ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="text-green"><?= $_SESSION['success'] ?></div>
            <?php }
            unset($_SESSION['success']) ?>
            <?php if (isset($_SESSION['edit'])) { ?>
                <div class="text-green"><?= $_SESSION['edit'] ?></div>
            <?php }
            unset($_SESSION['edit']) ?>
            <?php if (isset($_SESSION['not_del'])) { ?>
                <div class="text-green"><?= $_SESSION['not_del'] ?></div>
            <?php }
            unset($_SESSION['not_del']) ?>
            <div class="card-body">
                <form action="" method="POST">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Skill</th>
                            <th>Percentage</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($skills_res as $index => $skill) { ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $skill['skill_name'] ?></td>
                                <td><?= $skill['skill_percentage'] ?></td>
                                <td>
                                    <a href="skill_stutas.php?id=<?= $skill['id'] ?>" class="badge badge-<?= ($skill['stutas'] == 1 ? 'success' : 'light') ?>"><?= ($skill['stutas'] == 1 ? 'Active' : 'Deactive') ?></a>
                                </td>
                                <td>
                                    <a href="edit.php?id=<?= $skill['id'] ?>" class="btn btn-primary shadow del "><i class="fa fa-pencil"></i></a>
                                    
                                    <a data-link="delete.php?id=<?= $skill['id'] ?>" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow del "><i class="fa fa-trash"></i></a>
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
                <h2 class="text-white">Add new Skill</h2>
            </div>
            <?php if (isset($_SESSION['skill'])) { ?>
                <div class="text-green"><?= $_SESSION['skill'] ?></div>
            <?php }
            unset($_SESSION['skill']) ?>

            <div class="card-body">
                <form action="skill_post.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Skill Name:</label>
                        <input type="text" class="form-control" name="skill_name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Skill Percentage:</label>
                        <input type="text" class="form-control id" name="skill_percentage">
                    </div>
                    <div>
                        <button type="submit" class="btn bg-primary text-white px-5 ">Add Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php' ?>


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