<?php 
@include 'connection.php';
session_start();
if($_SESSION['is_login']){
    $id = $_SESSION['user_id'];
    $fetch_user_query = "SELECT * FROM cart WHERE user_id = $id";
    $fetch_user = $conn->query($fetch_user_query);
}
else{
    header("Location: /uts/login-register/login.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart</title>
<link rel="stylesheet" href="keranjang.css">
<link rel="icon" href="Logo_Ventura.png">
</head>
<body>

    <header>
        <a href="/uts/homepage/homepage.php">
            <button class="back-button">&#8592;</button>
        </a>
        <h2 style="text-align: center;">Keranjang</h2>
    </header>

<div class="cart-container">
    <div class="cart-items">
        <!-- <div class="select-all">
            <input type="checkbox" id="select-all">
            <label for="select-all">Pilih Semua</label>
        </div> -->
        <?php
        
        
            while($rowcart = $fetch_user->fetch_assoc()){
                $pid = $rowcart['product_id'];
                $fetch_product_query = "SELECT * FROM product WHERE product_id = $pid";
                $fetch_product = $conn->query($fetch_product_query);
                if($fetch_product->num_rows > 0) {
                    $row = $fetch_product->fetch_assoc();
                  ?>
                    <div class="cart-item">
                        <!-- <input type="checkbox"> -->
                        <img src="<?php echo $row['product_image'] ?>" alt="<?php echo $row['product_name'] ?>" class="item-image">
                        <div class="item-info">
                            <p class="store-name"><?php echo $row['product_name'] ?></p>
                        </div>
                        <div class="item-price">
                            <p>Rp<?php echo number_format($row['product_price'], 0, ',', '.'); ?></p>
                            <p class="total-price">Rp<?php $total = $row['product_price'] * $rowcart['cart_qty'];echo number_format($total, 0, ',', '.'); ?></p>
                            <a class="remove-button" href="delete.php?id=<?php echo $pid?>">Hapus</a>
                        </div>
                    </div>
            <?php
                  }
              }
              ?>
    </div>
</div>

</body>
</html>
