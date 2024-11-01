<?php
@include '../service/connection.php';
require_once("vendor/autoload.php");
date_default_timezone_set("Asia/Jakarta");
session_start();

$client_id = '666998737758-bf769ebeo2phad5nkp3rmk4crd09bhdn.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'http://localhost/uts/login-register/login.php';

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->createAuthUrl();

$client->addScope('email');
$client->addScope('profile');

if(isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if(!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);
        $service = new Google_Service_Oauth2($client);
        $profile = $service->userinfo->get();

        $google_name = $profile['name'];
        $google_email = $profile['email'];
        $google_id = $profile['id'];
        $token = $token['access_token'];
        $current_time = date('Y-m-d H:i:s');

        //id exist in database -> update
        //id doesnt exist before -> insert/register
        $check_query = "SELECT * FROM users WHERE oauth_id = $google_id";
        $check = $conn->query("$check_query");
        $user_data = $check->fetch_object();

        if($user_data) {
            $_SESSION['user_id'] = $user_data->user_id;
            $update_user_query = "UPDATE users SET username = '$google_name', email = '$google_email', last_login = '$current_time' WHERE oauth_id = '$google_id'";
            $update_user = $conn->query($update_user_query);
        } else {
            $insert_user_query = "INSERT INTO users (username, email, password, oauth_id, last_login) VALUE ('$google_name', '$google_email', '$token', '$google_id', '$current_time')";
            $insert_user = $conn->query($insert_user_query);
        }

        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $google_name;
        $_SESSION['email'] = $google_email;
        $_SESSION['oauth_id'] = $google_id;
        header("Location: /uts/homepage/homepage.php");
    } else {
        echo "Login gagal";
    }
}


if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    $captcha = $_POST['captcha'];
    $captcha_code = $_POST['captcha-random'];
    if($captcha != $captcha_code) {
        $error[] = "Captcha salah";
    } else {
        if ($count > 0 and $username == "admin"){
            header("Location: /uts/kelola-produk/kelola_produk.php");
        }
        else if($count > 0) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['is_login'] = true;
            $_SESSION['oauth_id'] = $row['oauth_id'];
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
                <div class="inputField" style="display: flex;">
                    <input style="width: 50%;" type="text" id="captcha" name="captcha" placeholder="Masukkan kode captcha"required>
                    <input style="width: 20%; display:flex; align-items: center; flex: 1; border: none; outline: none; color: #EA6932; font-weight: bold;"
                    id="captcha-rand" name="captcha-random" value="<?php echo $rand; ?>" readonly>
                </div>

                
                <button type="submit" name="submit" value="register">Login</button>
                
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