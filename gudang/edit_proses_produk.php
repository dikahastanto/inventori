<?php 

include '../config/koneksi.php';

$kode_produk = $_POST['kode_produk'];
$nama_produk = $_POST['nama_produk'];
$jenis       = $_POST['jenis'];
$harga       = $_POST['harga'];

$sql = "UPDATE tb_barang SET nama='$nama_produk',jenis='$jenis',harga='$harga' WHERE id_obat = '$kode_produk'";
$query = mysqli_query($konek,$sql);
var_dump($sql);
if($query){

    echo    "<script type=text/Javascript> alert('Berhasil Edit Data')
                window.location = 'index.php';
            </script>";

}else{
    echo    "<script type=text/Javascript> alert('Gagal Edit Data !')
                window.location = 'index.php';
            </script>";
}

?>