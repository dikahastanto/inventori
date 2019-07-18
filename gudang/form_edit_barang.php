<?php 
    
    include 'template/header.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_barang WHERE id_obat = '$id'";
    $query = mysqli_query($konek,$sql);
    $data = mysqli_fetch_array($query);
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Produk</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Form Edit Data Barang</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="edit_proses_produk.php" method="post">
                            <input readonly value="<?= $data['id_obat']; ?>" name="kode_produk" type="number" class="form-control" required placeholder="Kode Produk"><br>
                            <input value="<?= $data['nama']; ?>" name="nama_produk" type="text" class="form-control" required placeholder="Nama Produk"><br>
                            <select required name="jenis" class="form-control">
                                <option disabled>Pilih Jenis</option>
                                <option selected value="<?= $data['jenis']; ?>"><?= $data['jenis']; ?></option>
                                <option value="Jenis 1">Jenis 1</option>
                                <option value="Jenis 2">Jenis 2</option>
                            </select><br>
                            <input value="<?= $data['harga']; ?>" name="harga" type="number" class="form-control" required placeholder="Harga Produk"><br>
                            <button type="submit" class="btn btn-primary">Update</button>
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