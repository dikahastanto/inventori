<?php 

    include '../config/koneksi.php';
    $id_customer = $_POST['id_customer'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE tb_customer SET nama = '$nama',alamat='$alamat' WHERE id_customer = '$id_customer'";
    $query = mysqli_query($konek,$sql);
    
    if ($query) {
        
        echo    "<script type=text/Javascript> alert('Berhasil Merubah Data')
                    window.location = 'data_customer.php';
                </script>";

    }else{

        echo    "<script type=text/Javascript> alert('Gagal Merubah Data')
                    window.location = 'data_customer.php';
                </script>";

    }

?>