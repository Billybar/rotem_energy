<?php

session_start();
$dir_and_files = scandir('./upload_images');
$exists_dirs = [];
foreach ($dir_and_files as $dir) {
    if (is_dir("./upload_images/$dir") && $dir != '.' && $dir != '..') {
        $exists_dirs[] = $dir;
    }
}


?>




<?php
$page_title = 'home';
include_once 'header.php';
?>


<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2>Uploaded Sites</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-4"></div>
            <div class="col-4">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">site</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($exists_dirs as $index => $site) :
                        ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><a href="./upload_images/<?= $site; ?>"><?= $site; ?></a></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

<?php include_once 'footer.php'; ?>