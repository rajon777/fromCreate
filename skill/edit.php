<?php
require '../db.php';
require '../includes/header.php';
$id = $_GET['id'];
$select = "SELECT * FROM skills WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);
?>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header p-3 bg-primary">
                <h2 class="text-white">Skill Update</h2>
            </div>
            <div class="card-body">
                <form action="update.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" value="<?=$id?>" name="id">
                        <label for="" class="form-label">Skill Name:</label>
                        <input type="text" class="form-control" name="skill_name" value="<?=$after_assoc['skill_name']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Skill Percentage:</label>
                        <input type="text" class="form-control id" name="skill_percentage" value="<?=$after_assoc['skill_percentage']?>">
                    </div>
                    <div>
                        <button type="submit" class="btn bg-primary text-white px-5 ">Update Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php' ?>