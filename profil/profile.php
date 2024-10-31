<?php 
include("connection.php");
session_start();
if(isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];

  $select_query = "SELECT * FROM users WHERE user_id = '$user_id'";
  $result = mysqli_query($conn, $select_query);

  if($result) {
    $user_data = $result->fetch_assoc();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <link rel="stylesheet" href="profile.css">
  <link rel="icon" href="Logo_Ventura.png">
</head>
<body>
<header>
    <a href="/uts/homepage/homepage.php">
        <button class="back-button">&#8592;</button>
    </a>
    <h2 style="text-align: center;">Profile</h2>
</header>

  <div class="container">
    <div class="profile">
      <div class="profile-name">
        <p><?php echo $result['username']; ?></p>
      </div>
      <div class="profile-email">
        <p><?php echo $result['email']; ?></p>
      </div>
      <!-- <a href="edit-profil.php"><button class="button1">Ubah Profil</button></a> -->
      <a href="/uts/keranjang/keranjang.php"><button href="#" class="button1">Keranjang</button></a>
      <button href="#" class="button1">Kelola Produk</button>
      <button href="#" class="button1">Logout</button>
    </div>
  </div>
</body>
</html>
