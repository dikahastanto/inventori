<?php 
    
    include 'template/header.php';

    $sql = "SELECT * FROM tb_barang";
    $query = mysqli_query($konek,$sql);
    $jumlah_barang = mysqli_num_rows($query);

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->
    
    <div class="panel panel-container">
        <div class="row">
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-teal panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                        <div class="large"><?= $jumlah_barang ?></div>
                        <div class="text-muted">Total Barang</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-blue panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                        <div class="large">52</div>
                        <div class="text-muted">Comments</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-orange panel-widget border-right">
                    <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                        <div class="large">24</div>
                        <div class="text-muted">New Users</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                <div class="panel panel-red panel-widget ">
                    <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
                        <div class="large">25.2k</div>
                        <div class="text-muted">Page Views</div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Data Barang</div>
                <div class="panel-body">
                    <table class="table table-responsive table-hover">
                        <thead>
                            <td>Id</td>
                            <td>Nama Produk</td>
                            <td>Jenis</td>
                            <td>Harga</td>
                            <td>Stock</td>
                            <td>Action</td>
                        </thead>
                        <?php while ($data=mysqli_fetch_array($query)) :?>
                        <tr>
                            <td><?= $data['id_obat'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jenis'] ?></td>
                            <td><?= $data['harga'] ?></td>
                            <td><?= $data['stock'] ?></td>
                            <td>
                                <a href="add_stock.php?id=<?= $data['id_obat'] ?>">
                                    <button class="btn btn-primary">+ Stock</button>
                                </a>
                                <a href="form_edit_barang.php?id=<?= $data['id_obat'] ?>" class="link">
                                    <button class="btn btn-warning"> Edit </button>
                                </a>
                                <a href="delete_barang.php?id=<?= $data['id_obat'] ?>">
                                    <button onClick='return konfirmasi()' class="btn btn-danger"> Delete </button>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
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