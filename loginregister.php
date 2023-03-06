<?php

    session_start();
    require 'koneksi.php';


    if ( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];


    $result = mysqli_query ($koneksi, "SELECT nik FROM user WHERE id =$id");
    $row = mysqli_fetch_assoc($result);


    if ( $key === hash('sha256', $row['nik'])) {
        $_SESSION['login'] = true;
    }
}



    if (isset($_COOKIE['login'])) {
      if( $_COOKIE['login'] == 'true') {
            $_SESSION['login'] = true;
        }
    }


    if (isset($_SESSION["login"])) {
      header("location: index.php");
      exit;
    }






    if( isset($_POST["register"])) {

        if ( registrasi($_POST) > 0) {
        echo " <script>
            alert('Nik Berhasil didaftarkan!')
        </script>
        ";
    } else {
    echo mysqli_error($koneksi);
    }
}

    if( isset($_POST["login"])) {

        $nik = $_POST["nik"];
        $password = $_POST["password"];

        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE nik = '$nik'");



        if( mysqli_num_rows($result) === 1 ) {


        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

        $_SESSION["login"] = true;

        if( isset($_POST['checkbox'])) {
        setcookie('id', $row['id'], time() + 60);
        setcookie('key', hash('sha256', $row['nik']), time() + 60);
    }


        header("location: index.php");
        exit;
    }


    }

    $error = true;
}
    


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Logo website -->
    <link rel = "icon" type = "image/png" href = "Icon/EDP logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="login.css">
    <!-- Css -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css" />
    <!-- font awesome -->
    <title>Login Register</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container register-container">
            <form action="" method="post">
                <h1>Daftar dulu yuk!</h1>
                <input type="text" name="nik" id="nik" placeholder="Nik">
                <input type="password" name="password" id="password" placeholder="Password">
                <button type="submit" name="register">Daftar</button>
                <span>Created by IrfanSuparman. | &copy; 2023.</span>
                <div class="social-container">
                    <a href="#"><i class="fa-brands fa-github"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </form>
        </div>

        <div class="form-container login-container">
            <form action="" method="post" >
                <h1>Login dulu dong!</h1>
                <?php if (isset($error)) :   ?>
                <span>Cek kembali Nik & Password!</span>
                <?php endif; ?>
                <input type="text" name="nik" id="nik" placeholder="Nik">
                <input type="password" name="password" id="password" placeholder="Password">

                <div class="content">
                    <div class="checkbox">
                        <input type="checkbox" name="checkbox" id="checkbox">
                        <label>Remember Me</label>
                    </div>
                    <div class="pass-link">
                        <a href="#">dasar pelupa!, Lupa password disini</a>
                    </div>
                </div>
                <button type="submit" name="login">Login</button>
                <span>Created by IrfanSuparman. | &copy; 2023.</span>
                <div class="social-container">
                 <a href="#"><i class="fa-brands fa-github"></i></a>
                 <a href="#"><i class="fa-brands fa-youtube"></i></a>
                 <a href=""><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Hello <br> Teman</h1>
                    <p>Kalo udah ada akun, Login aja Sokin!</p>
                    <button class="ghost" id="login">Login
                    <i class="fa-solid fa-left-from-line"></i>
                    </button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h1 class="title">Mulai <br> Jelajahi Catatan</h1>
                    <p>Kalo gak ada ada akun, daftar dulu dong boy!</p>
                    <button class="ghost" id="register">Daftar
                    <i class="fa-solid fa-right-from-line"></i>
                    </button>
                </div>
            </div>
        </div>









    </div>
    

<script src="login.js"></script>


</body>
</html>