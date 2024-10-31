<?php
include "../service/connection.php";
session_start();
if (isset($_SESSION['is_login'])) {
    if(isset($_POST['add'])){
        $folderr = '../assets/';
        $pdname = $_POST['product_name'];
        $pdprice = $_POST['product_price'];
        $filename = $_FILES['image']['name'];
        $filetmpname = $_FILES['image']['tmp_name'];
    
        move_uploaded_file($filetmpname, $folderr.$filename);
    
        $sql = "INSERT INTO product (product_name, product_price, product_image) VALUES ('$pdname','$pdprice','$filename')";
        mysqli_query($conn,$sql);
    }
}else{
    header("Location: /uts/login-register/login.php");
}
$folder = '/uts/assets/';
$query = "SELECT * FROM product";
$result = $conn->query($query);
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
        <a class="back-button" href="/uts/service/destroy.php">&#8592;</a>
        <h2 style="text-align: center;">detail produk</h2>
    </header>

    <div class="container">  
        <section class="add-product">
            <h2>Tambah Produk</h2>
            <form action="kelola_produk.php" method="post" enctype="multipart/form-data">
                <input type="text" name="product_name" placeholder="Masukkan nama produk" required>
                <input type="number" name="product_price" placeholder="Masukkan harga produk" required>
                <input type="file" name="image" accept="image/*" required>
                <button type="submit" class="add-button" name="add">Tambah Produk</button>
            </form>
        </section>
        
        <section class="product-list">
            <?php
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $filename = $row['product_image'];
                    ?>
                    <div class="product-card">
                        <img src="<?php echo $folder.$filename ?>" alt="Product Image">
                        <div class="product-info">
                            <p><?php echo $row['product_name'] ?></p>
                            <p class="price" >Rp<?php echo number_format($row['product_price'], 0, ',', '.'); ?></p>
                            <div class="product-actions">
                                <a class="delete-button" href="/uts/service/delete_product.php?id=<?php echo $row['product_id']?>">Hapus</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </section>
    </div>
</body>
</html>
