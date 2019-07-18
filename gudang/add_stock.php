<?php 

    include 'template/header.php';
    $id = $_GET['id'];
    $sql_data = "SELECT * FROM tb_barang WHERE id_obat = '$id'";
    $query_data = mysqli_query($konek,$sql_data);
    $data = mysqli_fetch_array($query_data);

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Stok</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Form Tambah Stok</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="tambah_stock_proses.php" method="post">
                            <input value="<?= $data['id_obat']; ?>" name="kode_produk" type="hidden" class="form-control" required placeholder="Kode Produk"><br>
                            <input readonly value="<?= $data['nama']; ?>" name="nama_produk" type="text" class="form-control" required placeholder="Nama Produk"><br>
                            <label for="stock">Stok Sekarang</label>
                            <input readonly value="<?= $data['stock']; ?>" name="stock" type="number" class="form-control" required placeholder="Stok Produk"><br>
                            <label for="stock_tambah">Stoct Yang Akan Di Tambahkan</label>
                            <input name="stock_tambah" type="number" class="form-control" required placeholder="Stok Tambah"><br>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                            <a href="index.php"><button type="button" class="btn btn-warning">Back</button></a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include '../template/footer.php' ?>