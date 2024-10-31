<?php
include "../service/connection.php";
session_start();
if($_SESSION['is_login']){
  $usernama = $_SESSION['username'];
  $email = $_SESSION['email'];
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
  <title>Profile Page</title>
  <link rel="stylesheet" href="profile.css">
</head>
<body>
<header>
    <a href="/uts/homepage/homepage.php">
    <button class="back-button">&#8592;</button></a>
    <h2 style="text-align: center;">profile</h2>
</header>

  <div class="container">
    <div class="profile">
      <div class="profile-name"><?php echo $usernama ?></div>
      <div class="profile-email"><?= $email?></div>
      <a href="/uts/keranjang/keranjang.php" class="button1">Keranjang</a>
      <a href="/uts/service/destroy.php" class="button1">Logout</a>
    </div>
  </div>
</body>
</html>
