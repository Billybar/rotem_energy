<?php

require_once 'db.php';
session_start();

if (isset($_POST['submit_image'])) {
    echo '<pre>';
    print_r($_FILES['upload_image']);
    echo '</pre>';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';


    /*

     VALIDATION
     
     */

    if (!is_dir($_POST['city'] . '-' . $_POST['site'])) {
        mkdir("upload_images/" . $_POST['city'] . '-' . $_POST['site']);
    }
    move_uploaded_file($_FILES['upload_image']['tmp_name'], "upload_images/" . $_POST['city'] . '-' . $_POST['site'] . '/' . $_FILES['upload_image']['name']);
}
?>





<?php
$page_title = 'add_photos';
include_once 'header.php';
?>

<main>
    <div class="container my-5">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-lg-4 border border-primary rounded bg-light">
                <form class="px-2 py-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label hidden for="city"></label>
                        <input type="text" name="city" class="form-control text-center" id="city" placeholder="city">
                        <!-- <span class="text-danger"><?= $error['employee_notes']; ?></span> -->
                    </div>
                    <div class="form-group">
                        <label hidden for="site"></label>
                        <input type="text" name="site" class="form-control text-center" id="site" placeholder="site">
                        <!-- <span class="text-danger"><?= $error['site']; ?></span> -->
                    </div>
                    <!-- <div class="form-group">
                        <label hidden for="full_name"></label>
                        <input type="text" name="full_name" class="form-control text-center" id="full_name" placeholder="full_name">
                        <span class="text-danger"><?= $error['full_name']; ?></span>
                    </div> -->
                    <div class="form-group">
                        <label hidden for="clean_dirt"></label>
                        <select name="clean_dirt" class="form-control text-center" id="clean_dirt" value="">
                            <option class="text-center" value="" disabled="disabled" selected="selected">clean / dirt</option>
                            <option value="clean">Clean</option>
                            <option value="dirt">Dirt</option>
                        </select>
                        <!-- <span class="text-danger"><?= $error['clean_dirt']; ?></span> -->
                    </div>
                    <div class="form-group">
                        <label hidden for="upload_image"></label>
                        <input type="file" name="upload_image" class="form-control text-center" id="upload_image">
                        <!-- <span class="text-danger"><?= $error['upload_image']; ?></span> -->
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit_image" class="form-control text-center btn btn-info" id="submit">Submit-file</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</main>
<?php include_once 'footer.php'; ?>