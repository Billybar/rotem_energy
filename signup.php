<?php
require_once 'db.php';
require_once 'helpers.php';

session_start();

$error = [
    'name' => '',
    'email' => '',
    'password' => '',
];


if (isset($_POST['submit'])) {

    // ------ prevent XSS attack && Trim user inputs
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));


    /*  VALIDATION


        ... TO DO MORE VALIDATION


     VALIDATION */


    // ------ create hash password && send sql query
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO employees(name,email,password,created_at) VALUES(?,?,?,NOW())";
    $stmt = mysqli_stmt_init($link);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hash_password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_affected_rows($stmt);
    if ($result > 0) {
        $uid = mysqli_stmt_insert_id($stmt);
        $_SESSION['user_id'] = $uid;
        $_SESSION['user_name'] = $name;
        header("location: ./index.php?signup=Welcome " . $name);
    }
}



$page_title = 'signup';
include_once 'header.php';
?>

<main class="container my-5">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-lg-4 border border-primary rounded bg-light">
            <form class="px-2 py-3" action="" method="POST">
                <div class="form-group pt-2">
                    <label hidden for="name"></label>
                    <input type="text" class="form-control text-center" name="name" id="name" value="<?= old('name'); ?>" placeholder="name">
                    <span class="text-danger"><?= $error['name']; ?></span>
                </div>
                <div class="form-group">
                    <label hidden for="email"></label>
                    <input type="email" class="form-control text-center" name="email" id="email" value="<?= old('email'); ?>" placeholder="email">
                    <span class="text-danger"><?= $error['email']; ?></span>
                </div>
                <div class="form-group">
                    <label hidden for="password"></label>
                    <input type="password" class="form-control text-center" name="password" id="password" value="<?= old('password'); ?>" placeholder="password">
                    <span class="text-danger"><?= $error['password']; ?></span>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="form-control text-center btn btn-info" id="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include_once 'footer.php'; ?>