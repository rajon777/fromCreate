<?php
require '../db.php';
require '../includes/header.php';
$select_logo = "SELECT * FROM logos";
$select_logo_res = mysqli_query($db_connection, $select_logo);
$after_assoc_logo = mysqli_fetch_assoc($select_logo_res);
?>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header  p-4 bg-primary">
                <h1 class="text-white">Change Logo</h1>
            </div>
            <?php if(isset($_SESSION['logo'])){ ?>
                <strong class="text-green"><?=$_SESSION['logo']?></strong>
            <?php } unset($_SESSION['logo']) ?>
            <div class="card-body">
                <form action="logo_update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">
                            <h3>Change Header Logo</h3>
                        </label>
                        <input type="file" name="header_logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-2">
                            <img src="../uploads/logo/<?=$after_assoc_logo['header_logo']?>"  id="blah" alt=""  width="200">
                        </div>
                        <?php if(isset($_SESSION['err'])) { ?>
                                <strong class="text-danger"><?=$_SESSION['err']?></strong>
                        <?php } unset($_SESSION['err'])?>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">
                            <h3>Change Footer Logo</h3>
                        </label>
                        <input type="file" name="footer_logo" class="form-control" onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mt-2">
                            <img src="../uploads/logo/<?=$after_assoc_logo['footer_logo']?>"  id="blah1" alt="" width="200">
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn bg-primary text-white px-5 ">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php' ?>