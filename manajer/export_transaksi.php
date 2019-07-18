
<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=laporan_transaksi.xls");

// Tambahkan table
include '../config/koneksi.php';

$sql = "SELECT * FROM tb_transaksi";
$query = mysqli_query($konek,$sql);


?>
<table class="table tabel-striped table-hover">
    <tr>
        <td>No Faktur</td>
        <td>Nama Customer</td>
        <td>Diskon Customer</td>
        <td>Sub Total</td>
        <td>Potongan</td>
        <td>Total Transaksi</td>
        <td>Kasir</td>
        <td>Waktu</td>
    </tr>

<?php
while ($data=mysqli_fetch_array($query)) {
    echo "<tr>
            <td>".$data['id_transaksi']."</td>
            <td>".$data['nama_customer']."</td>
            <td>".$data['diskon_customer']."</td>
            <td>".$data['sub_total']."</td>
            <td>".$data['potongan']."</td>
            <td>".$data['total_transaksi']."</td>
            <td>".$data['username']."</td>
            <td>".$data['time_stamp']."</td>
        </tr>";
}
?>

</table>