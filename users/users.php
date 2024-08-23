<?php require '../db.php';
session_start();
?>
<?php require '../includes/header.php' ?>
<?php
$select = "SELECT * FROM users";
$select_res = mysqli_query($db_connection, $select);


?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header  p-2 bg-primary">
                <h3 class="text-white ">Users List</h3>
                <?php if($after_assoc_log['rule'] == 1) {?>
                <a class="btn btn-light" data-toggle="modal" data-target="#basicModal">Add New Users</a>
                <?php } ?>

                <div class="modal fade" id="basicModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="../register_post.php" method="POST">
                                <div class="modal-header p-2 bg-primary">
                                    <h3 class="modal-title text-white">Add New User</h3>
                                    <button type="button" class="close text-white" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="" class="form-label">Fast Name:</label>
                                        <input type="text" name="fast_name" class="form-control" placeholder="Fast name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Last Name:</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Last name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Commnet:</label>
                                        <br>
                                        <textarea name="comments" placeholder="Comments" class="textarea textarea-bordered  w-full"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password:</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Confirm Password:</label>
                                        <input type="password" name="confirm_password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="mb-3">
                                        <select class="px-5 py-2 rounded-lg" name="country">
                                            <option value="">--Select Your Country--</option>
                                            <option value="BAN">BAN</option>
                                            <option value="USA">USA</option>
                                            <option value="IND">IND</option>
                                            <option value="AUS">AUS</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" name="gender" type="radio" value="male" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="gender" type="radio" value="female" id="flexCheckChecked">
                                            <label class="form-check-label " for="flexCheckChecked">
                                                Female
                                            </label>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Add User</button>
                                    </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="text-green"><?= $_SESSION['success'] ?></div>
            <?php }
            unset($_SESSION['success']) ?>
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Fast Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>Gender</th>
                    <th>Photo</th>
                    <?php if ($after_assoc_log['rule'] == 1) { ?>
                        <th>Action</th>
                    <?php } ?>
                </tr>
                <?php foreach ($select_res as $sl => $user) { ?>

                    <tr>
                        <th><?= $sl + 1 ?></th>
                        <th><?= $user['fast_name'] ?></th>
                        <th><?= $user['last_name'] ?></th>
                        <th><?= $user['email'] ?></th>
                        <th><?= $user['country'] ?></th>
                        <th><?= $user['gender'] ?></th>
                        <th>
                            <?php if ($user['photo'] == null) { ?>
                                <span>No Preview Found</span>
                            <?php } else { ?>
                                <img src="/fromCreate/uploads/users/<?= $user['photo'] ?>" width="100" alt="">
                            <?php } ?>
                        </th>
                        <?php if ($after_assoc_log['rule'] == 1) { ?>
                            <td>
                                <a data-link="user_delete.php?id=<?= $user['id'] ?>" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow del "><i class="fa fa-trash"></i></a>

                            </td>
                        <?php } ?>
                    </tr>

                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php if ($after_assoc_log['rule'] == 1) { ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header  p-2 bg-primary">
                <h3 class="text-white m-auto">Assing Role</h3>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['role'])) { ?>
                    <div class="text-green"><?= $_SESSION['role'] ?></div>
                <?php }
                unset($_SESSION['role']) ?>
                <form action="role_update.php" method="POST">
                    <div class="mb-3">
                        <label class="" for="">Select Role:</label>
                        <select name="role" class="form-control" id="">

                            <option value="">Select Admin</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">Moderator</option>
                            <option value="4">Editor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="" for="">Select User:</label>
                        <select name="user_id" class="form-control" id="">
                            <option value="">Select Admin</option>
                            <?php foreach ($select_res as $user) { ?>
                                <option value="<?= $user['id'] ?>"><?= $user['fast_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Assign Role</button>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
</div>

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

<?php require '../includes/footer.php' ?>
<script>
    $('.del').click(function() {
        // alert();
        var link = $(this).attr('data-link');
        $('.yes').click(function() {
            window.location.href = link;
        })
        // alert(link);
    })
</script>