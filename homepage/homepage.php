<?php 
include("connection.php");
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
  <link rel="icon" href="Logo_Ventura.png">
</head>
<body>

  <div class="header">
    <div class="logo">
      <img src="Logo_Ventura.png" alt="Logo">
    </div>
    <input type="text" placeholder="Cari di Ventura" class="search-bar">
    <div class="icons">
      <a href="/uts/keranjang/keranjang.php"><img src="Keranjang.svg" alt="Cart" class="icon"></a>
      <a href="#" id="profile-text">Profile</a>
    </div>
  </div>

  <h2 style="text-align: center;">Produk Rekomendasi</h2>

    <form method="post">
        <div class="product-container">
            <?php
            if($fetch_product->num_rows > 0) {
                while($row = $fetch_product->fetch_assoc()) {
                ?>
                <div class="product-card">
                    <object name="product_image"><img src="<?php echo $row['product_image']; ?>"></object>
                    <object name="product_name"><?php echo $row['product_name']; ?></object>
                    <object name="product_price"><p class="price">Rp<?php echo number_format($row['product_price'], 0, ',', '.'); ?></p></object>
                    <button type="submit" name="add_to_cart" value="+" class="add-icon">+</button>
                </div>
                <?php
                }
            }
            ?>
        </div>
    </form>


</body>
</html>