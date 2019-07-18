<?php
session_start();
    include "../config/koneksi.php";
    
    
    $char = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
    $string = '';
    for($i = 0; $i < 20; $i++) {
        $pos = rand(0, strlen($char)-1);
        $string .= $char{$pos};
    }
    $id_transaksi = $string;

    $id_customer = $_POST['id_customer'];
    $nama_customer = $_POST['nama_customer'];
    $diskon_customer = $_POST['diskon_customer'];
    $sub_total = $_POST['sub_total'];
    $potongan = $_POST['potongan'];
    $total_transaksi = $_POST['total_transaksi'];

    $username = $_SESSION['nama']; //nanti dari session

    $barangs = json_decode($_POST['barangs'],true);
    $sql = "INSERT INTO tb_transaksi (id_transaksi,id_customer,nama_customer,diskon_customer,sub_total,potongan,total_transaksi,username) VALUES ('$id_transaksi','$id_customer','$nama_customer','$diskon_customer','$sub_total','$potongan','$total_transaksi','$username')";
    $query = mysqli_query($konek,$sql);
    $msg = array();
    for ($i=0; $i < count($barangs); $i++) { 
        
        $id_barang = $barangs[$i]['id_barang'];
        $nama_barang = $barangs[$i]['nama_barang'];
        $harga = $barangs[$i]['harga'];
        $jumlah = $barangs[$i]['jumlah'];
        $sql_barang = "INSERT INTO tb_detail_transaksi (id_transaksi,id_barang,nama_barang,harga,jumlah) VALUES ('$id_transaksi','$id_barang','$nama_barang','$harga','$jumlah')";
        $query_barang = mysqli_query($konek,$sql_barang);

        $sql_stock = "SELECT stock FROM tb_barang WHERE id_obat = '$id_barang'";
        $query_stock = mysqli_query($konek,$sql_stock);
        $stock = mysqli_fetch_array($query_stock);
        $stock_sekarang = $stock['stock'];
        $sisa_stock = $stock_sekarang - $jumlah;

        $sql_kurangi_stock = "UPDATE tb_barang SET stock='$sisa_stock'";
        $query_simpan = mysqli_query($konek,$sql_kurangi_stock);
    }
    
    if ($query) {
        
        $msg['error'] = false;
        $msg['id_transaksi'] = $id_transaksi;
        $json = json_encode($msg);
        print($json);

    }else{

        $msg['error'] = true;
        $json = json_encode($msg);
        print($json);

    }
?>