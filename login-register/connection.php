<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ecommerce";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn) {
    die("Error");
}