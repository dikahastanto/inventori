<?php 

    include '../config/koneksi.php';
    $id = $_GET['username'];
    $sql = "DELETE FROM tb_karyawan WHERE username = '$id'";
    $query = mysqli_query($konek,$sql);

    if ($sql) {

        echo    "<script type=text/Javascript> alert('Berhasil Hapus Data')
                window.location = 'index.php';
            </script>";

    }else {

        echo    "<script type=text/Javascript> alert('Gagal Hapus Data')
                window.location = 'index.php';
            </script>";
        
    }

?>