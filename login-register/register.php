<?php
@include 'connection.php';
if(isset($_POST["submit"])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $password = $_POST['password'];
   
    $select = "SELECT * FROM users WHERE username = '$username' && password = '$password' && email = '$email'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {
        $error[] = "Pengguna telah terdaftar";
    } else {
        $insert = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conn, $insert);
        header("Location: login.php");
    }
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

                
                <button type="submit" name="submit" value="register">Register</button>
                
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