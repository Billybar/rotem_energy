<?php
$link = mysqli_connect('localhost', 'root', '', 'many_to_many');

$student_arr = [
    'billy',
    'jhon',
    'lika',
];


$class_arr = [
    'web',
    'prog',
    'php',
];

$sql = "UPDATE class_students SET name = 1 WHERE name = 'web'";
$result = mysqli_query($link, $sql);
echo mysqli_affected_rows($link);

$sql = "UPDATE class_students SET name = 2 WHERE name = 'prog'";
$result = mysqli_query($link, $sql);
echo mysqli_affected_rows($link);

$sql = "UPDATE class_students SET name = 3 WHERE name = 'php'";
$result = mysqli_query($link, $sql);
echo mysqli_affected_rows($link);
