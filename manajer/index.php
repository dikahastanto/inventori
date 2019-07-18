
<?php
// Create database connection using config file
include '../config/koneksi.php';

// Fetch all users data from database
$result = mysqli_query($konek, "SELECT * FROM tb_barang ORDER BY id DESC");
?>

<?php include 'template/header.php' ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Data Barang</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <td>Id</td>
                            <td>Nama Produk</td>
                            <td>Jenis</td>
                            <td>Harga</td>
                            <td>Stock</td>
                            <td>diskon</td>
                            <td>Action</td>
                        </thead>
                        <?php
                        $sql = "SELECT * FROM tb_barang";
                        $query = mysqli_query($konek,$sql);
                        while($obat = mysqli_fetch_array($query)){
                            echo "<tr>";
                            echo "<td>".$obat['id_obat']."</td>";
                            echo "<td>".$obat['nama']."</td>";
                            echo "<td>".$obat['jenis']."</td>";
                            echo "<td>".$obat['harga']."</td>";
                            echo "<td>".$obat['stock']."</td>";
                            echo "<td>".$obat['diskon']."</td>";
                            echo "<td>";
                            echo "<a href='from_edit_barang.php?id_obat=".$obat['id_obat']."'><button class='btn btn-primary'>Edit</button></a> ";
                            echo "<a href='delete.barang.php?id_obat=".$obat['id_obat']."'><button class='btn btn-danger' onClick='return konfirmasi()'>Hapus</button></a>";
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