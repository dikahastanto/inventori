<?php 

    include '../config/koneksi.php';
    $id_customer = $_GET['id'];

    $sql = "DELETE FROM tb_customer WHERE id_customer = '$id_customer'";
    $query = mysqli_query($konek,$sql);
    
    if ($query) {
        
        echo    "<script type=text/Javascript> alert('Berhasil Hapus Data')
                    window.location = 'data_customer.php';
                </script>";

    }else{

        echo    "<script type=text/Javascript> alert('Gagal Hapus Data')
                    window.location = 'data_customer.php';
                </script>";

    }

?>