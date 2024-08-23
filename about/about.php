<?php
require '../db.php';
require '../includes/header.php';
$select = "SELECT * FROM abouts"; 
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);
?>

<div class="row">
    <div class="col-lg-8">
        <div class="card  ">
            <div class="card-header p-4 bg-primary">
                <h1 class="text-white">Update About Information</h1>
            </div>
            <?php if (isset($_SESSION['about'])) { ?>
                <strong class="text-green"><?= $_SESSION['about'] ?></strong>
            <?php }
            unset($_SESSION['about']) ?>
            <div class="card-body">
                <form action="update.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Designation</label>
                        <input type="text" class="form-control" name="designation" value="<?= $after_assoc['designation'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $after_assoc['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea name="desp" id="" class="form-control" rows="5"><?= $after_assoc['desp'] ?></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn bg-primary text-white px-5 ">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header p-3 bg-primary">
                <h2 class="text-white">Update Image</h2>
            </div>
            <?php if (isset($_SESSION['image'])) { ?>
                <strong class="text-green"><?= $_SESSION['image'] ?></strong>
            <?php }
            unset($_SESSION['image']) ?>
            <div class="card-body">
                <form action="update_image.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Updated Image</label>
                        <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <div class="m-2">
                            <img src="../uploads/image/<?= $after_assoc['image'] ?>" id="blah" alt="" width="200">

                            <?php if (isset($_SESSION['err'])) { ?>
                                <strong class="text-danger"><?= $_SESSION['err'] ?></strong>
                            <?php }
                            unset($_SESSION['err']) ?>
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