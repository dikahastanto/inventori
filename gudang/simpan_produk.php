<?php 

include '../config/koneksi.php';

$kode_produk = $_POST['kode_produk'];

$sql_cek = "SELECT * FROM tb_barang WHERE id_obat = '$kode_produk'";
$query_cek = mysqli_query($konek,$sql_cek);
$barang_exists = mysqli_num_rows($query_cek);

if ($barang_exists > 0) {
    die("<script type=text/Javascript> alert('Kode Produk Sudah Ada!')
            window.location = 'form_insert_barang.php';
        </script>");
}

$nama_produk = $_POST['nama_produk'];
$jenis       = $_POST['jenis'];
$harga       = $_POST['harga'];
$stock       = $_POST['stock'];

$sql = "INSERT INTO tb_barang (id_obat,nama,jenis,harga,stock) VALUES ('$kode_produk','$nama_produk','$jenis','$harga','$stock')";
$query = mysqli_query($konek,$sql);

if($query){

    echo    "<script type=text/Javascript> alert('Berhasil Input')
                window.location = 'index.php';
            </script>";

}else{
    echo    "<script type=text/Javascript> alert('Gagal Input!')
                window.location = 'form_insert_barang.php';
            </script>";
}

?>