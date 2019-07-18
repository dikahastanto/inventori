<?php 

    include '../config/koneksi.php';

    $id_customer = $_POST['id_customer'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $diskon = $_POST['diskon'];

    $sql_cek = "SELECT * FROM tb_customer WHERE id_customer='$id_customer'";
    $query_cek = mysqli_query($konek,$sql_cek);
    $cek = mysqli_num_rows($query_cek);

    if ($cek > 0) {

        echo    "<script type=text/Javascript> alert('Id Customer Telah Terdaftar !')
                    window.location = 'form_insert_customer.php';
                </script>";

    }else{

        $sql = "INSERT INTO tb_customer (id_customer,nama,alamat,diskon) VALUES ('$id_customer','$nama','$alamat','$diskon')";
        $query = mysqli_query($konek,$sql);
        
        if ($query) {

            echo    "<script type=text/Javascript> alert('Berhasil Daftar')
                        window.location = 'form_insert_customer.php';
                    </script>";

        }else {

            echo    "<script type=text/Javascript> alert('Gagal Daftar !')
                        window.location = 'form_insert_customer.php';
                    </script>";

        }

    }

?>