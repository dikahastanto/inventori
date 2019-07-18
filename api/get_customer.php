<?php 
    include "../config/koneksi.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_customer WHERE id_customer = '$id'";
    $query = mysqli_query($konek,$sql);

    $data = mysqli_fetch_array($query);

    $json = json_encode($data);
    print($json);
?>