<?php
@include 'connection.php';
session_start();
if(isset($_SESSION['is_login'])){
    header("Location: /uts/homepage/homepage.php");
}else{
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        
        if($username=="admin") {
            header("Location: /uts/kelola-produk/kelola_produk.php");
        }
        else if ($count > 0){
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['is_login'] = true;
            header("Location: /uts/homepage/homepage.php");
        }
        else if ($count > 0 and $data['password'] != $password){
            $error[] = "Username atau Password salah";
        }
        else {
            $error[] = "Akun Tidak Ditemukan";
        }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login Page</title>
    <link rel="icon" href="Logo_Ventura.png">
</head>
<body>
    <header>
        <div class="navbar">
            <img src="logo.png" id="logo">
            <nav>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </nav>
        </div>
    </header>

    <div class="formContainer">
        <div class="formBox">
            <h2>Login</h2>
            <p>Belum punya akun? <a href="register.php" id="sign-link">Register</a></p>

            <form method="post">
                <?php
                if(isset($error)) {
                    foreach($error as $error) {
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                }; 
                ?>
                <div class="inputField">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="inputField">
                    <input type="password" id="username" name="password" placeholder="Password"required>
                </div>

                
                <button type="submit" name="submit" value="register">Login</button>
                
                <div class="inputField" id="separator">
                    <hr class="line">
                    <p id="atau">ATAU</p>
                    <hr class="line">
                </div>
                
                <div class="inputField" id="google-logo">
                    <img src="google-logo.png" id="google">
                </div>
            </form>
        </div>
    </div>
</body>
</html>