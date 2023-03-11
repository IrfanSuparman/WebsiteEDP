<?php
session_start();


if (!isset($_SESSION["nama"])) {
    header("location: loginregister.php");
    exit;
}



require_once 'koneksi_dude.php';
$query = "SELECT * FROM dude_jkt2 WHERE type LIKE '%INDUK%' ORDER BY kdtk ASC ";
$result =  mysqli_query($koneksi, $query);


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
    <link rel="icon" type="image/png" href="Icon/EDP logo.png">
    <!-- CSS -->
    <link rel="stylesheet" href="login.css">
    <!-- Css -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome-free-6.3.0-web/css/all.css" />
    <!-- font awesome -->
    <title>User SO DCP</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container userso-container">
            <form action="" method="POST">
                <h1>Daftar User SO DCP</h1>

                <div class="custom_select">
                    <label>Pilih KodeToko :</label>
                    <select name="kdtk" required>
                        <?php
                        while ($data = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $data['kdtk']; ?>"><?php echo $data['kdtk']; ?> - <?php echo $data['nama_toko']; ?> </option>
                        <?php } ?>
                        <!-- <option Value="">KDTK</option>
                        <option value="TBPD">TBPD</option>
                        <option value="TUOL">TUOL</option> -->
                    </select>
                </div>
                <input type="text" name="id" id="nik" placeholder="Nik">
                <input type="text" name="nama" id="nama" placeholder="nama">
                <input type="text" name="group" id="group" placeholder="group">
                <input type="password" name="password" id="password" placeholder="Password">
                <div class="button_userso">
                    <button type="submit" name="daftarso">Daftar</button>
                    <button type="submit" name="kembali"><a href="datasintak.php">Kembali</a> </button>
                </div>
                <?php
                // memanggil file koneksi.php untuk melakukan koneksi database

                if (isset($_POST['daftarso'])) {

                    // membuat variabel untuk menampung data dari form
                    include "koneksi_dude.php";
                    $kdtk = $_POST['kdtk'];

                    $query = mysqli_query($koneksi, "SELECT addresses FROM dude_jkt2 where kdtk like '%" . $kdtk . "%' AND type like '%induk%'");

                    while ($data = mysqli_fetch_array($query)) {
                ?>

                        <?php
                        $ip = $data['addresses'];
                        ?>
                <?php
                        include "koneksi_toko.php";

                        $id      = $_POST['id'];
                        $nama      = $_POST['nama'];
                        $group    = $_POST['group'];
                        $password    = $_POST['password'];

                        $result = mysqli_query($koneksi1, "INSERT INTO usersodcp (ID, NAMA, `GROUP`, `PASSWORD`) VALUES ('$id', '$nama', '$group', '$password')");
                    }
                    // periska query apakah ada error
                    if (!$result) {
                        die("Query gagal dijalankan: " . mysqli_errno($koneksi1) .
                            " - " . mysqli_error($koneksi1));
                    } else {
                        //tampil alert dan akan redirect ke halaman index.php
                        //silahkan ganti index.php sesuai halaman yang akan dituju
                        echo "<script>alert('UserSO Berhasil.');window.location='userso.php';</script>";
                    }
                }
                ?>
            </form>
        </div>
    </div>


    <script src="login.js"></script>


</body>

</html>
