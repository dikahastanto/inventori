<?php 

    include '../config/koneksi.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM tb_barang WHERE id_obat = '$id'";
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