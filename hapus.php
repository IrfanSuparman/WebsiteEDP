    <?php
    include 'koneksi.php';
         try {

            $sql = "DELETE FROM datasintak WHERE id =" .$_GET['id'];
            $koneksi->query($sql);

                                if(!$sql){
                                    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                         " - ".mysqli_error($koneksi));
                                } else {
                                  //tampil alert dan akan redirect ke halaman index.php
                                  //silahkan ganti index.php sesuai halaman yang akan dituju
                                  echo "<script>alert('Data berhasil diupdate.');</script>";
                                }
              
          } catch (Exception $e) {
              echo $e;
              die();
          } 

    ?>

    