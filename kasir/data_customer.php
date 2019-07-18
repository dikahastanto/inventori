<?php 

    include 'template/header.php';

    $sql = "SELECT * FROM tb_customer";
    $query = mysqli_query($konek,$sql);
    
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kasir</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Data Customer</div>
                <div class="panel-body">
                    <table class="table table-responsive table-hover">
                        <thead>
                            <td>Id Customer</td>
                            <td>Nama Customer</td>
                            <td>Alamat Customer</td>
                            <td>Diskon</td>
                            <td>Action</td>
                        </thead>
                        <?php while ($data=mysqli_fetch_array($query)) :?>
                        <tr>
                            <td><?= $data['id_customer'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['diskon'] ?> %</td>
                            <td>
                                <a href="give_diskon.php?id=<?= $data['id_customer'] ?>">
                                    <button type="button" class="btn btn-primary">Give Diskon</button>
                                </a>
                                <a href="form_edit_customer.php?id=<?= $data['id_customer'] ?>">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                                <a href="delete_customer.php?id=<?= $data['id_customer'] ?>">
                                    <button onClick='return konfirmasi()' type="button" class="btn btn-danger">Delete</button>
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