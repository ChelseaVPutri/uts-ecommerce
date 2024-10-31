<?php
include "service/connection.php";
session_start();
if (isset($_SESSION['is_login']) && $_SESSION['username']=="admin") {
    if(isset($_GET['add'])){
        $pdname = $_GET['product_name'];
        $pdprice = $_GET['product_price'];
        $filename = $_FILES['upload']['name'];
        $filetmpname = $_FILES['upload']['tmp_name'];
        $folder = 'uts/assets/img/';

        move_uploaded_file($filetmpname, $folder.$filename);

        $sql = "INSERT INTO product (name, price, image) VALUES ('$pdname','$pdprice','$filename')";
    }
}else{
    header("Location: uts/login-register/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="assets/kelola_produk.css">
</head>
<body>
    <header>
        <button class="back-button">&#8592;</button>
        <h2 style="text-align: center;">detail produk</h2>
    </header>

    <div class="container">  
        <section class="add-product">
            <h2>Tambah Produk</h2>
            <form method="GET">
                <input type="text" name="product_name" placeholder="Masukkan nama produk" required>
                <input type="number" name="product_price" placeholder="Masukkan harga produk" required>
                <input type="file" name="product_image" placeholder="Masukkan gambar produk">
                <button type="submit" class="add-button" name="add">Tambah Produk</button>
            </form>
        </section>
        
        <section class="product-list">
            <div class="product-card">
                <img src="chair.png" alt="Product Image">
                <div class="product-info">
                    <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi...</p>
                    <p class="price">Rp259.900</p>
                    <div class="product-actions">
                        <button class="delete-button">Hapus</button>
                        <button class="view-button">Lihat</button>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <img src="chair.png" alt="Product Image">
                <div class="product-info">
                    <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi...</p>
                    <p class="price">Rp259.900</p>
                    <div class="product-actions">
                        <button class="delete-button">Hapus</button>
                        <button class="view-button">Lihat</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
