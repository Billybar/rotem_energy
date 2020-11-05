<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');
define('DB_DATABASE', 'rotem_energy');

$link = mysqli_connect(DB_SERVER, DB_USER, DB_PWD, DB_DATABASE);

if ($link === false) die('connection error' . mysqli_connect_error());
