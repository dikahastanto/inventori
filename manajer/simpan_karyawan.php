<?php 

include '../config/koneksi.php';

$username = $_POST['username'];

$sql_cek = "SELECT * FROM tb_karyawan WHERE id_karyawan = '$username'";
$query_cek = mysqli_query($konek,$sql_cek);
$barang_exists = mysqli_num_rows($query_cek);

if ($barang_exists > 0) {
    die("<script type=text/Javascript> alert('Kode Karyawan Sudah Ada!')
            window.location = 'input_data_karyawan.php';
        </script>");
}

$password          = '12345678';
$hash_password = password_hash($password,PASSWORD_DEFAULT);
$nama_karyawan     =$_POST['nama_karyawan'];
$id_karyawan       =$_POST['id_karyawan'];
$alamat_karyawan   =$_POST['alamat_karyawan'];
$jabatan           =$_POST['jabatan'];
$jenis_kelamin     =$_POST['jenis_kelamin'];
$no_tlp            =$_POST['no_tlp'];
$level;
if ($jabatan == 'Gudang') {
    $level = 1;
}else{
    $level = 2;
}


$sql = "INSERT INTO tb_karyawan (username,password,nama_karyawan,id_karyawan,alamat_karyawan,jabatan,level,jenis_kelamin,no_tlp) VALUES ('$username','$hash_password','$nama_karyawan','$id_karyawan','$alamat_karyawan','$jabatan','$level','$jenis_kelamin','$no_tlp')";
$query = mysqli_query($konek,$sql);

if($query){

    echo    "<script type=text/Javascript> alert('Berhasil Input data karyawan')
                window.location = 'index.php';
            </script>";

}else{
    // var_dump($sql);
    echo    "<script type=text/Javascript> alert('Gagal Input!')
        
            </script>";
}

?>