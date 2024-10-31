<?php
@include 'connection.php';
if(isset($_POST["submit"])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $password = $_POST['password'];
   
    // $select = "SELECT * FROM users WHERE username = '$username' && password = '$password' && email = '$email'";
    // $result = mysqli_query($conn, $select);

    try {
        $insert = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conn, $insert);
        header("Location: login.php");
    } catch (mysqli_sql_exception) {
        $error[] = "Username tidak boleh sama";
    }
    // if(mysqli_num_rows($result) > 0) {
    //     $error[] = "Pengguna telah terdaftar";
    // } else {
        
    // }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Register Page</title>
    <link rel="icon" href="Logo_Ventura.png">
</head>
<body>
    <?php 
    $rand = rand(9999, 1000);
    ?>
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
            <h2>Register</h2>
            <p>Sudah punya akun? <a href="login.php" id="sign-link">Login</a></p>

            <form method="post">
                <?php
                if(isset($error)) {
                    foreach($error as $error) {
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                }; 
                ?>
                <div class="inputField">
                    <input type="email" id="username" name="email" placeholder="Email"required>
                </div>
                <div class="inputField">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="inputField">
                    <input type="password" id="username" name="password" placeholder="Password"required>
                </div>
                <div class="inputField" style="display: flex;">
                    <input style="width: 50%;" type="text" id="captcha" name="captcha" placeholder="Masukkan kode captcha"required>
                    <input style="width: 20%; display:flex; align-items: center; flex: 1; border: none; outline: none; color: #EA6932; font-weight: bold;"
                    id="captcha-rand" name="captcha-random" value="<?php echo $rand; ?>" readonly>
                </div>


                
                <button type="submit" name="submit" value="register">Register</button>
                
                <div class="inputField" id="separator">
                    <hr class="line">
                    <p id="atau">ATAU</p>
                    <hr class="line">
                </div>
                
                <div class="inputField" id="google-logo">
                    <a href="<?= $client->createAuthUrl(); ?>">
                        <img src="/uts/assets/google.png" id="google" style="width: 100%; height: 50px; padding-top: 10px;">
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>