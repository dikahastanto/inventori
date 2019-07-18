<?php 

    include '../config/koneksi.php';
    $id_customer = $_POST['id_customer'];
    $diskon = $_POST['diskon_baru'];

    $sql = "UPDATE tb_customer SET diskon = '$diskon' WHERE id_customer = '$id_customer'";
    $query = mysqli_query($konek,$sql);
    
    if ($query) {
        
        echo    "<script type=text/Javascript> alert('Berhasil Merubah Diskon')
                    window.location = 'data_customer.php';
                </script>";

    }else{

        echo    "<script type=text/Javascript> alert('Gagal Merubah Diskon')
                    window.location = 'data_customer.php';
                </script>";

    }

?>