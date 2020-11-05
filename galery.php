<?php

session_start();






?>

<?php
$page_title = 'gallry';
include_once 'header.php';
?>


<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Gallry</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-4">
                <img src="./upload_images/afek/clean_a.jpeg" alt="" class="img-thumbnail">
                <img src="./upload_images/afek/clean_b.jpeg" alt="" class="img-thumbnail">
                <img src="./upload_images/afek/dirt_a.jpeg" alt="" class="img-thumbnail">
                <img src="./upload_images/afek/dirt_b.jpeg" alt="" class="img-thumbnail">
                <img src="./upload_images/afek/dirt_c.jpeg" alt="" class="img-thumbnail">
                <img src="./upload_images/afek/dirt_d.jpeg" alt="" class="img-thumbnail">
            </div>
        </div>
    </div>
</main>
<?php include_once 'footer.php'; ?>