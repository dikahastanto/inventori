<?php 

include '../config/koneksi.php';
$username         =$_POST['username'];
$nama_karyawan     =$_POST['nama_karyawan'];
$id_karyawan       =$_POST['id_karyawan'];
$alamat_karyawan   =$_POST['alamat_karyawan'];
$jabatan           =$_POST['jabatan'];
$level             =$_POST['level'];
$jenis_kelamin     =$_POST['jenis_kelamin'];
$no_tlp            =$_POST['no_tlp'];

$sql = "UPDATE tb_karyawan SET nama_karyawan='$nama_karyawan',id_karyawan='$id_karyawan',alamat_karyawan='$alamat_karyawan',
jabatan='$jabatan',level='$level',jenis_kelamin='$jenis_kelamin',no_tlp='$no_tlp' WHERE username = '$username'";
$query = mysqli_query($konek,$sql);
var_dump($sql);
if($query){

    echo    "<script type=text/Javascript> alert('Berhasil Edit Data')
                window.location = 'tampil_data_karyawan.php';
            </script>";

}else{
    echo    "<script type=text/Javascript> alert('Gagal Edit Data !')
                window.location = 'index.php';
            </script>";
}

?>