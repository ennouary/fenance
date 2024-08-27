<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'formsdata';

$con = mysqli_connect($hostname, $username, $password, $dbname);
if (!$con) {
    die(mysqli_error($con));
}


?>