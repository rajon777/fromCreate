<?php
require '../db.php' ?>
<?php require '../includes/header.php' ?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header p-2 bg-primary ">
                <h3 class="m-auto text-white ">Update Profile Info</h3>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['success'])) { ?>
                    <strong class="text-green"><?= $_SESSION['success'] ?></strong>
                <?php }
                unset($_SESSION['success']) ?>
                <form action="profile_update.php" method="POST">
                    <div class="mb-3 mt-2">
                        <label>
                            <h4 class="text-2xl">Fast Name:</h4>
                        </label> <br>
                        <input type="text" class="form-control" placeholder="Enter the fast name" value="<?= $after_assoc_log['fast_name'] ?>" name="fast_name">
                    </div>
                    <div class="mb-3">
                        <label>
                            <h4 class=" ">Last Name:</h4>
                        </label> <br>
                        <input type="text" class="form-control" placeholder="Enter the last name" name="last_name" value="<?= $after_assoc_log['last_name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label>
                            <h4 class="">Email:</h4>
                        </label> <br>
                        <input type="text" class="form-control" placeholder="Email" value="<?= $after_assoc_log['email'] ?>" name="email">
                    </div>
                    <div class="mb-3">
                        <select class="px-5 py-2 rounded-lg" name="country">
                            <option value="">--Select Your Country--</option>
                            <option value="BAN" <?= ($after_assoc_log['country'] == 'BAN' ? 'selected' : '') ?>>BAN</option>
                            <option value="USA" <?= ($after_assoc_log['country'] == 'USA' ? 'selected' : '') ?>>USA</option>
                            <option value="IND" <?= ($after_assoc_log['country'] == 'IND' ? 'selected' : '') ?>>IND</option>
                            <option value="AUS" <?= ($after_assoc_log['country'] == 'AUS' ? 'selected' : '') ?>>AUS</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="gender" type="radio" value="male" id="flexCheckDefault" <?= ($after_assoc_log['gender'] == 'male' ? 'checked' : '') ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="gender" type="radio" value="female" id="flexCheckChecked" <?= ($after_assoc_log['gender'] == 'female' ? 'checked' : '') ?>>
                            <label class="form-check-label " for="flexCheckChecked">
                                Female
                            </label>
                        </div>
                    </div>
                    <div>
                        <!-- <button type="submit" class="btn bg-primary text-white rounded">Submit</button> -->
                        <button type="submit" class="btn bg-primary text-white px-5 ">Submit</button>
                    </div>


                </form>
            </div>
        </div>
        <!-- Update password -->

    </div>
    <!-- Update Password -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header p-2 bg-primary ">
                <h3 class="m-auto text-white ">Update Password</h3>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['pass_update'])) { ?>
                    <strong class="text-green"><?= $_SESSION['pass_update'] ?></strong>
                <?php }
                unset($_SESSION['pass_update']) ?>
                <form action="update_password.php" method="POST">
                    <div class="mb-3 mt-2">
                        <label>
                            <h4 class="text-2xl">Current Password:</h4>
                        </label> <br>
                        <input type="hidden" name="user_id" value="<?= $after_assoc_log['id'] ?>">
                        <input type="password" class="form-control" placeholder="current password" name="current_password">
                        <?php if (isset($_SESSION['crn_pass_err'])) { ?>
                            <strong class="text-danger"><?= $_SESSION['crn_pass_err'] ?></strong>
                        <?php }
                        unset($_SESSION['crn_pass_err']) ?>
                    </div>
                    <div class="mb-3">
                        <label>
                            <h4 class=" ">New Password:</h4>
                        </label> <br>
                        <input type="password" class="form-control" placeholder="new passwoerd" name="new_password">
                        <?php if (isset($_SESSION['nw_pass_err'])) { ?>
                            <strong class="text-danger"><?= $_SESSION['nw_pass_err'] ?></strong>
                        <?php }
                        unset($_SESSION['nw_pass_err']) ?>
                    </div>
                    <div class="mb-3">
                        <label>
                            <h4 class="">Comfirm Password:</h4>
                        </label> <br>
                        <input type="password" class="form-control" placeholder="comfirm password" name="comfirm_password">
                        <?php if (isset($_SESSION['cfm_pass_err'])) { ?>
                            <strong class="text-danger"><?= $_SESSION['cfm_pass_err'] ?></strong>
                        <?php }
                        unset($_SESSION['cfm_pass_err']) ?>
                    </div>
                    <div>
                        <button type="submit" class="btn bg-primary text-white px-5 ">Update</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!-- update Photo -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header p-2 bg-primary">
                <h3 class="m-auto text-white">Update Profile Image</h3>
            </div>
            <?php if (isset($_SESSION['photo_update'])) { ?>
                <strong class="text-green"><?= $_SESSION['photo_update'] ?>
                <?php }
            unset($_SESSION['photo_update']) ?>
                <div class="card-body">
                    <?php if (isset($_SESSION['err'])) { ?>
                        <strong class="text-danger"><?= $_SESSION['err'] ?>
                        <?php }
                    unset($_SESSION['err']) ?>
                        <form action="photo_update.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="hidden" name="user_id" value="<?= $after_assoc_log['id'] ?>">
                                <label for="" class="form label">Upload Photo</label>
                                <input type="file" name="photo" class="form control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                <div class="p-2">
                                    <img id="blah" alt="" width="200">
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn bg-primary text-white px-5 ">Update image</button>
                            </div>

                </div>
                </form>
        </div>
    </div>
</div>


</div>
<?php require '../includes/footer.php' ?>