<?php
include "connection.php";
$id = $_GET['id'];
$sqldel = "DELETE FROM product WHERE product_id = $id";
$delete=$conn->query($sqldel);
header("Location: /uts/kelola-produk/kelola_produk.php");
?>