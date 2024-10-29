<?php 
include("connection.php");
// session_start();

// if(isset($_POST['add_to_cart'])) {
//     $product_name = $_POST['product_name'];
//     $product_price = $_POST['product_price'];
//     $product_image = $_POST['product_image'];
//     $product_qty = 1;
    
//     $select_cart_query = "SELECT * FROM 'product' WHERE product_name = '$product_name'";
//     $select_cart = mysqli_query($conn, $select_cart_query);

//     $add_cart_query = "INSERT INTO 'cart' (product_name, product_price, product_qty, product_image)
//                         VALUES ('$product_name', '$product_price', '$product_qty', '$product_image'";
//     $add_cart = mysqli_query($conn, $add_cart_query);
//     $message[] = "Produk Ditambahkan ke Keranjang";
// }
$fetch_product_query = "SELECT * FROM product";
$fetch_product = $conn->query($fetch_product_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>
  <link rel="stylesheet" href="main_page.css" >
</head>
<body>

  <div class="header">
    <div class="logo">
      <img src="Logo_Ventura.png" alt="Logo">
    </div>
    <input type="text" placeholder="Cari di Ventura" class="search-bar">
    <div class="icons">
      <img src="Keranjang.svg" alt="Cart" class="icon">
      <!-- <img src="Vector.svg" alt="Profile" class="icon"> -->
      <a href="#" id="profile-text">Profile</a>
    </div>
  </div>

  <h2 style="text-align: center;">Produk Rekomendasi</h2>

  <div class="product-container">
    <div class="product-card">
      <img src="mask.png" alt="Mask">
      <p>MASKER SENSI DUCKBILL SACHET ISI 6 PCS</p>
      <p class="price">Rp14.900</p>
      <!-- <span class="add-icon">+</span> -->
      <button type="submit" name="add_to_cart" value="add-to-cart" class="add-icon">+</button>
    </div>

    <div class="product-card">
      <img src="mouse.png" alt="Mouse">
      <p>VortexSeries ONI R1 LightWeight Ergonomic</p>
      <p class="price">Rp349.000</p>
      <button type="submit" name="add_to_cart" value="add-to-cart" class="add-icon">+</button>
    </div>

    <div class="product-card">
      <img src="fridge.png" alt="Fridge">
      <p>AQUA Elektronik Kulkas 2 Pintu 169 L AQR-D251</p>
      <p class="price">Rp2.595.000</p>
      <button type="submit" name="add_to_cart" value="add-to-cart" class="add-icon">+</button>
    </div>

    <div class="product-card">
      <img src="chair.png" alt="Chair">
      <p>Frasser Kursi Kantor Jaring Kursi Staff Kursi...</p>
      <p class="price">Rp259.900</p>
      <button type="submit" name="add_to_cart" value="add-to-cart" class="add-icon">+</button>
    </div>

  </div>

</body>
</html>
