
<?php
// Create database connection using config file
include '../config/koneksi.php';

// Fetch all users data from database
$result = mysqli_query($konek, "SELECT * FROM tb_karyawan ORDER BY id DESC");
?>

<?php include 'template/header.php' ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">DATA KARYAWAN</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Data Karyawan</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <td>Username</td>
                            <td>Nama Karyawan</td>
                            <td>Id</td>
                            <td>Alamat Karyawan </td>
                            <td>jabatan</td>
                            <td>Jenis kelamin</td>
                            <td>No Telpon</td>
                            <td>level</td>
                            <td>Action</td>
                        

                        </thead>
                        <?php
                        $sql = "SELECT * FROM tb_karyawan";
                        $query = mysqli_query($konek,$sql);

                        while($karyawan = mysqli_fetch_array($query)){
                            echo "<tr>";

                            echo "<td>".$karyawan['username']."</td>";
                            echo "<td>".$karyawan['nama_karyawan']."</td>";
                            echo "<td>".$karyawan['id_karyawan']."</td>";
                            echo "<td>".$karyawan['alamat_karyawan']."</td>";
                            echo "<td>".$karyawan['jabatan']."</td>";
                            echo "<td>".$karyawan['jenis_kelamin']."</td>";
                            echo "<td>".$karyawan['no_tlp']."</td>";
                            echo "<td>".$karyawan['level']."</td>";
                            echo "<td>";
                            echo "<a href='aksi.edit.php?username=".$karyawan['username']."'><button class='btn btn-primary'>Edit</button></a> ";
                            echo "<a href='aksi.delete.php?username=".$karyawan['username']."'><button onclick='return kofirmasi()' class='btn btn-danger'>Hapus</button></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
<script type="text/javascript" language="javascript">
	function konfirmasi () {
		var pilihan = confirm ("Apakah Anda Yakin ?");
		if(pilihan){
			return true
			}else{
			alert ("Proses Di Batalkan")
			return false
			}
	}
</script>
<?php include '../template/footer.php' ?>