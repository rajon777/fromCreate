<?php
require '../db.php';
include '../includes/header.php';
$id = $_GET['id'];
$select = "SELECT * FROM services WHERE id=$id";
$select_res_service = mysqli_query($db_connection, $select);
$after_assoc_service = mysqli_fetch_assoc($select_res_service);
?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header p-3 bg-primary">
                <h2 class="text-white"> Service Edit</h2>
            </div>
            <div class="card-body">
                <form action="update.php" method="POST">
                    <div class="mb-2">
                        <input type="hidden" name="id" value="<?= $after_assoc_service['id'] ?>">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="<?= $after_assoc_service['title'] ?>">
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Description</label>
                        <textarea name="desp" id="" rows="5" class="form-control"><?= $after_assoc_service['desp'] ?></textarea>
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Service Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>