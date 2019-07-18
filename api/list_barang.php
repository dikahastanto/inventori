<?php 
    include "../config/koneksi.php";

    $sql = "SELECT nama FROM tb_barang";
    $query = mysqli_query($konek,$sql);

    $nama = array();
    while ($data=mysqli_fetch_array($query)) {
        $nama_barang=array();
        $nama_barang = $data['nama'];
        array_push($nama,$nama_barang);

    }

    $json = json_encode($nama);
    print($json);
?>