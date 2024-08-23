<?php
require '../db.php';
require '../includes/header.php';
$id = $_GET['id'];
$select_protfolio = "SELECT * FROM protfolios WHERE id=$id";
$select_protfolio_res = mysqli_query($db_connection, $select_protfolio);
$select_protfolio_assoc = mysqli_fetch_assoc($select_protfolio_res);

?>
<div class="col-lg-8">
    <div class="card">
        <div class="card-header p-3 bg-primary">
            <div class="h2 text-white">Update Protfolio</div>
        </div>
        <?php if (isset($_SESSION['size'])) { ?>
            <div class="text-green"><?= $_SESSION['size'] ?></div>
        <?php }
        unset($_SESSION['size']) ?>

        <?php if (isset($_SESSION['format'])) { ?>
            <div class="text-green"><?= $_SESSION['format'] ?></div>
        <?php }
        unset($_SESSION['format']) ?>
        
        <div class="card-body">
            <form action="update.php" method="POST" enctype="multipart/form-data">
                <div class="mb-2">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <label for="" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $select_protfolio_assoc['title'] ?>">
                </div>
                <div class="mb-2">
                    <label for="" class="form-label">Category</label>
                    <input type="text" class="form-control" name="category" value="<?= $select_protfolio_assoc['category'] ?>">
                </div>
                <div class="mb-2">
                    <label for="" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" value="<?= $select_protfolio_assoc['image'] ?>">
                    <div class="m-2">
                        <img src="../uploads/protfolio/<?= $select_protfolio_assoc['image'] ?>" alt="" id="blah" width="200">
                    </div>
                    <?php if (isset($_SESSION['image'])) { ?>
                        <div class="text-danger"><?= $_SESSION['image'] ?></div>
                    <?php }
                    unset($_SESSION['image']) ?>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">Update profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>