<?php

require_once 'db.php';
require_once 'helpers.php';
session_start();
$error = [
    'id_employee' =>  '',
    'hour_amt' => '',
    'kw_amt' => '',
    'kilometer_amt' => '',
    'working_day' => '',
    'working_date' => '',
    'employee_notes' => '',
    'is_school' => '',
];

$form_submited = '';

// cehck if user submitted.
if (isset($_GET['submit'])) {

    // ------- Prevent XSS && Trim user inputs
    $hour_amt = filter_input(INPUT_GET, 'hour_amt', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $kw_amt = filter_input(INPUT_GET, 'kw_amt', FILTER_SANITIZE_NUMBER_INT);
    $kilometer_amt = filter_input(INPUT_GET, 'kilometer_amt', FILTER_SANITIZE_NUMBER_INT);
    $working_day = filter_input(INPUT_GET, 'working_day', FILTER_SANITIZE_NUMBER_INT);
    $working_date = trim(filter_input(INPUT_GET, 'working_date', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $employee_notes = trim(filter_input(INPUT_GET, 'employee_notes', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $is_school = trim(filter_input(INPUT_GET, 'is_school', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));


    // form will stay valid as long all inputs are good
    $form_validation = true;


    // inputs validation
    if (!$hour_amt) {
        $hour_amt = null;
        $form_validation = true;
    }
    if (!$kw_amt) {
        $error['kw_amt'] = '*How many kilowatt?';
        $form_validation = false;
    }
    if (!$kilometer_amt && !$kilometer_amt === '0') {
        $error['kilometer_amt'] = '*How many kilometer?';
        $form_validation = false;
    }
    if (!$working_day) {
        $error['working_day'] = '*day you worked?';
        $form_validation = false;
    }
    if (!$working_date) {
        $error['working_date'] = '*date of work?';
        $form_validation = false;
    }
    if (mb_strlen($employee_notes) > 300) {
        $error['employee_notes'] = '*max of 300 chars\'?';
        $form_validation = false;
    }
    if (!$is_school) {
        $error['is_school'] = '*must choose';
        $form_validation = false;
    }


    // get user_id
    $uid = $_SESSION['user_id'];


    // if all inputs are good - send query ( using stmt to prevent sql injenction )
    if ($form_validation) {
        $sql = "INSERT INTO salary VALUES('',$uid,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($link);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "iiiisss", $hour_amt, $kw_amt, $kilometer_amt, $working_day, $working_date, $employee_notes, $is_school);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) > 0) $form_submited = '<h4 class="text-success text-center">Form submited</h4>';
    }
}

$page_title = 'add_day';
include_once 'header.php';
?>



<main class="container my-5">
    <div class="row">
        <div class="col-12">
            <?= $form_submited; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-lg-4 border border-primary rounded bg-light">
            <form class="px-2 py-3" action="" method="GET">
                <div class="form-group">
                    <label hidden for="hour_amt"></label>
                    <input type="text" class="form-control text-center" name="hour_amt" id="hour_amt" value="<?= old('hour_amt'); ?>" placeholder="hour_amt">
                    <span class="text-danger"><?= $error['hour_amt']; ?></span>
                </div>
                <div class="form-group">
                    <label hidden for="kw_amt"></label>
                    <input type="text" class="form-control text-center" name="kw_amt" id="kw_amt" value="<?= old('kw_amt'); ?>" placeholder="kw_amt">
                    <span class="text-danger"><?= $error['kw_amt']; ?></span>
                </div>
                <div class="form-group">
                    <label hidden for="kilometer_amt"></label>
                    <input type="text" class="form-control text-center" name="kilometer_amt" id="kilometer_amt" value="<?= old('kilometer_amt'); ?>" placeholder="kilometer_amt">
                    <span class="text-danger"><?= $error['kilometer_amt']; ?></span>
                </div>
                <div class="form-group">
                    <label hidden for="working_day">Example select</label>
                    <select name="working_day" class="form-control text-center" id="working_day" value="">
                        <option value="" disabled="disabled" selected="selected">Select day</option>
                        <option value="1">Sunday</option>
                        <option value="2">Monday</option>
                        <option value="3">Tuesday</option>
                        <option value="4">Wednesday</option>
                        <option value="5">Thursday</option>
                        <option value="6">Friday</option>
                    </select>
                    <span class="text-danger"><?= $error['working_day']; ?></span>
                </div>
                <div class="form-group">
                    <label hidden for="is_school">Example select</label>
                    <select name="is_school" class="form-control text-center" id="is_school">
                        <option value="" disabled selected>Is school</option>
                        <option value="no">NO</option>
                        <option value="yes">YES</option>
                    </select>
                    <span class="text-danger"><?= $error['is_school']; ?></span>
                </div>
                <div class="form-group">
                    <label hidden for="working_date"></label>
                    <input type="date" class="form-control text-center" name="working_date" id="working_date" value="<?= old('working_date'); ?>" placeholder="date">
                    <span class="text-danger"><?= $error['working_date']; ?></span>
                </div>
                <div class="form-group">
                    <label hidden for="employee_notes"></label>
                    <textarea name="employee_notes" class="form-control text-center" id="employee_notes" value="<?= old('employee_notes'); ?>" rows="1" placeholder="notes (optional)"></textarea>
                    <span class="text-danger"><?= $error['employee_notes']; ?></span>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="form-control text-center btn btn-info" id="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include_once 'footer.php'; ?>