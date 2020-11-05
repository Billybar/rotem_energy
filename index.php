<?php


require_once 'db.php';
session_start();

$user_level = isset($_SESSION['user_level']) ?  $_SESSION['user_level'] : 0;
if (isset($_SESSION['user_id'])) {

    // get user_id
    $uid = $_SESSION['user_id'];

    // only admin can acsses
    if ($user_level == 1) {
        if (isset($_GET['submit_uid'])) {
            $uid = $_GET['uid'];
        }
    }

    // get data from salary TABLE base on $UID
    $sql = "SELECT * ";
    $sql .= "FROM salary ";
    $sql .= "WHERE id_employee = $uid";
    $result = mysqli_query($link, $sql);
    if (!$result) echo 'query or connection problame';

    // get total data from salary TABLE base on $UID
    $sql = "SELECT ROUND(AVG(hour_amt),2) hour_avg,SUM(kw_amt) kw_sum, SUM(kilometer_amt) km_sum, is_school ";
    $sql .= "FROM salary ";
    $sql .= "WHERE id_employee = $uid ";
    $result_sum = mysqli_query($link, $sql);
    if (!$result_sum) echo 'result_sum no good';
}


if (!isset($_GET['signup'])) {
    $_GET['signup'] = '';
}
?>


<?php
$page_title = 'home';
include_once 'header.php';
?>

<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center text-success">
                <h2><?= $_GET['signup']; ?></h2>
            </div>
        </div>
        <?php
        if ($user_level == 1) {
        ?>
            <form class="form-inline mt-5" action="" method="GET">
                <div class="form-group">
                    <label hidden for="uid"></label>
                    <input type="text" class="form-control" name='uid' placeholder="Employee ID" id="uid">
                </div>
                <div class="form-group ml-2">
                    <button class="btn btn-info" type="submit" name="submit_uid">Submit</button>
                </div>
            </form>
        <?php
        }
        ?>
        <div class="row my-5 py-5">
            <div class="col-12">
                <h5 class="text-muted">Daily</h5>
                <table class="table table-striped text-center table-all-data-salary">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hours</th>
                            <th scope="col">Kw</th>
                            <th scope="col">Km</th>
                            <th scope="col">day</th>
                            <th scope="col">Date</th>
                            <th scope="col">Notes</th>
                            <th scope="col">School</th>
                        </tr>
                    </thead>
                    <!-- fetch data base on $uid from 'salary' TABLE -->
                    <tbody>
                        <?php if (isset($result) && $result->num_rows > 0) :
                            $x = 1;
                            while ($row = mysqli_fetch_assoc($result)) :
                        ?>
                                <tr>
                                    <th scope="col"><?= $x; ?></th>
                                    <td><?= $row['hour_amt']; ?></td>
                                    <td><?= $row['kw_amt']; ?></td>
                                    <td><?= $row['kilometer_amt']; ?></td>
                                    <td><?= $row['working_day']; ?></td>
                                    <td><?= $row['working_date']; ?></td>
                                    <td><?= $row['employee_notes']; ?></td>
                                    <td><?= $row['is_school']; ?></td>
                                </tr>
                        <?php
                                $x++;
                            endwhile;
                        endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row my-5 py-5">
            <div class="col-12">
                <h5 class="text-muted">Total</h5>
                <table class="table table-striped text-center">
                    <!-- fetch total data base on $uid from 'salary' TABLE -->
                    <tbody>
                        <?php if (isset($result_sum) && $result_sum->num_rows == 1) :
                            $row = mysqli_fetch_assoc($result_sum);
                        ?>
                            <tr>
                                <th><?= $row['kw_sum']; ?> <sub>kw</sub></th>
                                <th><?= $row['km_sum']; ?> <sub>km</sub></th>
                                <th><?= $row['hour_avg']; ?> <sub>Hpd</sub></th>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row my-5 py-5">
            <div class="col-12">
                <h5 class="text-muted">Payment</h5>
                <table class="table table-striped text-center">
                    <thead>
                        <th>Kw</th>
                        <th>Km</th>
                        <th class="text-danger">Total</th>
                        </tr>
                    </thead>
                    <!-- show total payment -->
                    <tbody>
                        <tr>
                            <?php
                            // check if site was a school
                            $row['is_school'] ? $row['kw_sum'] = $row['kw_sum'] * 1.8 : $row['kw_sum'] * 1.3;
                            ?>
                            <!-- render total payment -->
                            <th>&#x20aa;<?= $row['kw_sum']; ?></th>
                            <th>&#x20aa;<?= $row['km_sum'] * 1.4; ?></th>
                            <th class="text-danger">&#x20aa;<?= $row['kw_sum'] + $row['km_sum'] * 1.4; ?></th>
                        </tr>
                    <?php
                        endif;
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include_once 'footer.php'; ?>