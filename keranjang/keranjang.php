<?php 
@include 'connection.php';


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
        <button class="back-button">&#8592;</button>
        <h2 style="text-align: center;">Keranjang</h2>
    </header>

<div class="cart-container">
    <div class="cart-items">
        <!-- <div class="select-all">
            <input type="checkbox" id="select-all">
            <label for="select-all">Pilih Semua</label>
        </div> -->

        <div class="cart-item">
            <input type="checkbox">
            <img src="hand_sanitizer.png" alt="Klarens Hand Sanitizer" class="item-image">
            <div class="item-info">
                <p class="store-name">Klarens Official</p>
                <p class="item-name">Hand sanitizer Klarenss Refill Pink Rose 500ml Twin Pack</p>
            </div>
            <div class="item-price">
                <p>Rp150.000</p>
                <div class="quantity-control">
                    <input type="number" value="1" min="1">
                    <button>Update QTY</button>
                </div>
                <p class="total-price">Rp150.000</p>
                <button class="remove-button">Hapus</button>
            </div>
        </div>

        <div class="cart-item">
            <input type="checkbox" checked>
            <img src="keyboard.png" alt="keyboard" class="item-image">
            <div class="item-info">
                <p class="store-name">TokoTeknoPro</p>
                <p class="item-name">Press Play Shibuya PBT Dye Sub Keycap Set 120 Keys Japanese Root</p>
            </div>
            <div class="item-price">
                <p>Rp379.000</p>
                <div class="quantity-control">
                    <input type="number" value="1" min="1">
                    <button>Update QTY</button>
                </div>
                <p class="total-price">Rp379.000</p>
                <button class="remove-button">Hapus</button>
            </div>
        </div>

    </div>

    <div class="cart-footer">
        <p>Total: <span>Rp379.000</span></p>
        <button class="checkout-button">Checkout</button>
    </div>
</div>

</body>
</html>
