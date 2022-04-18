<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Prakash@123";
$dbname = "php_project";

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname,3307);

if (!$connect) {
    echo("Connection failed: " . $connect->connect_error);

  }
?>

