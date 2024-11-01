<?php
include "connection.php";
$id = $_GET['id'];
$sqldel = "DELETE FROM cart WHERE product_id = $id";
$delete=$conn->query($sqldel);
header("Location: /uts/keranjang/keranjang.php");
?>