<?php 
include("../service/connection.php");
session_start();
if($_SESSION['is_login']){
    $user_id = $_SESSION['user_id'];
    $masuk = "";
    $folder = "/uts/assets/";
    
    if(isset($_GET['product_id'])) {
        $_SESSION['product_id']=$_GET['product_id'];
        $product_id = $_SESSION['product_id'];
    
        $fetch_product_query = "SELECT * FROM product WHERE product_id = ?";
        $stmt = $conn->prepare($fetch_product_query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        }
    }
    else if(isset($_SESSION['product_id'])){
        $product_id = $_SESSION['product_id'];
    
        $fetch_product_query = "SELECT * FROM product WHERE product_id = ?";
        $stmt = $conn->prepare($fetch_product_query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        }
    }
    
    if(isset($_POST['add_cart'])){
        
        $qty = $_POST['qty_add'];
        $sql = "INSERT INTO cart (user_id, product_id, cart_qty) VALUES ('$user_id','$product_id','$qty')";
        if($conn->query($sql)){
            $masuk = "berhasil masuk kedalam cart";
        }
        else{
            $masuk = "data tidak masuk";
        }
    }
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
    <title>Product Page</title>
    <link rel="stylesheet" href="halaman_produk.css">
    <link rel="icon" href="Logo_Ventura.png">
</head>
<body>

    <header>
        <a href="/uts/homepage/homepage.php">
            <button class="back-button">&#8592;</button></a>
        <h2 style="text-align: center;">Detail Produk</h2>
    </header>

    <div class="container">
        <div class="product-section">
            <div class="product-image">
                <img src="<?php echo $folder.$product['product_image']; ?>" alt="<?php echo $product['product_name']; ?>">
            </div>
            <div class="product-details">
                <object name="product_name">
                    <h2><?php echo $product['product_name'];?></h2>
                </object>
                <object name="product_price">
                    <p class="price">Rp<?php echo number_format($product['product_price'], 0, ',', '.'); ?></p>
                </object>
                <h3>Deskripsi</h3>
                <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus auctor orci sit amet magna fermentum, non auctor urna efficitur. Integer pharetra, enim a cursus suscipit, velit sapien tempor ipsum, et suscipit risus augue a nunc...
                </p>
                
                <div class="quantity-section">
                    <form action="halaman_produk.php" method="post">
                        <input class="quantity-input" type="number" value="1" min="1" name="qty_add">
                        <button class="cart-button" name="add_cart">Masukkan ke keranjang</button>
                    </form>
                </div>
                <i style="color: green;"><?php echo $masuk;?></i>
            </div>
        </div>
    </div>

</body>
</html>
