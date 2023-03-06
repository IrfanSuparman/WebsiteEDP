<?php

require 'koneksi.php';


if( isset($_POST["simpan"])) {

        if ( lupas($_POST) > 0) {
        echo " <script>
            alert('Data Berhasil diupdate!')
        </script>
        ";
    } else {
    echo mysqli_error($koneksi);
    }

    header("location: loginregister.php");
        exit;
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
        <div class="form-container lupapassword-container">
            <form action="" method="post">
                <h1>Update Password Baru Yaa!</h1>
                <input type="text" name="nik" id="nik" placeholder="Nik">
                <input type="password" name="password" id="password" placeholder="Password">
                <button type="submit" name="simpan">Simpan</button>
                <span>Created by IrfanSuparman. | &copy; 2023.</span>
                <div class="social-container">
                    <a href="#"><i class="fa-brands fa-github"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>