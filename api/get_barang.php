<?php 
    include "../config/koneksi.php";

    $nama = $_GET['nama'];
    $sql = "SELECT * FROM tb_barang WHERE nama = '$nama'";
    $query = mysqli_query($konek,$sql);

    $data = mysqli_fetch_array($query);

    $json = json_encode($data);
    print($json);
?>