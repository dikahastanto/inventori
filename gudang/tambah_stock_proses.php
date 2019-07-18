<?php 

    include '../config/koneksi.php';
    $stok_lama = $_POST['stock'];
    $stok_tambah = $_POST['stock_tambah'];
    $id = $_POST['kode_produk'];
    $stock_total = $stok_lama + $stok_tambah;

    $sql = "UPDATE tb_barang SET stock = '$stock_total' WHERE id_obat = '$id'";
    $query = mysqli_query($konek,$sql);

    if ($query) {
        
        echo    "<script type=text/Javascript> alert('".$stok_tambah." stock berhasil ditambahkan')
                    window.location = 'index.php';
                </script>";

    }else{

        echo    "<script type=text/Javascript> alert('Gagal menambah stock')
                    window.location = 'index.php';
                </script>";

    }

?>