<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./main.css">
    <title><?= $page_title; ?></title>
</head>

<body id="bootstrap-overrides">
    <header>
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand text-info" href="index.php">ROTEM<sub>energy</sub></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-5 text-info" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-5 px-5">
                        <a class="nav-link text-info" href="./uploaded_images.php"><?= isset($_SESSION['user_name']) ? 'images-a' : "images-b"; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" href="./add_day.php"><?= isset($_SESSION['user_name']) ? 'add-day' : ''; ?> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" href="./add_photos.php"><?= isset($_SESSION['user_name']) ? 'add-photos' : ''; ?> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ml-5 pl-5">
                        <a class="nav-link text-info" href="./signup.php"><?= isset($_SESSION['user_name']) ? '' : "signup"; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" href="./login.php"><?= isset($_SESSION['user_name']) ? '' : 'login'; ?></a>
                    </li>
                    <li class="nav-item ml-5 pl-5">
                        <a class="nav-link text-info" href="">Hello <?= isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Amigo'; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" href="./logout.php"><?= isset($_SESSION['user_name']) ? 'logout' : ''; ?></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>