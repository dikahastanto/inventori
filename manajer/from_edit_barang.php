<?php 
    
    include 'template/header.php';
    $id = $_GET['id_obat'];
    $sql = "SELECT * FROM tb_barang WHERE id_obat= '$id'";
    $query = mysqli_query($konek,$sql);
    $obat = mysqli_fetch_array($query);

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Barang</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Form Edit Data Barang</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="proses_edit_barang.php" method="post">
                            <label>Id Barang</label>
                            <input readonly value=<?= $obat['id_obat']; ?> name="id_obat" type="teks" class="form-control" required placeholder="username"><br>
                            
                            <label>Nama Barang</label>
                            <input value=<?= $obat['nama']; ?> name="jenis" type="teks" class="form-control" required placeholder="password"><br>
                            
                            <label>Harga</label>
                            <input value=<?= $obat['harga']; ?> name="harga" type="teks" class="form-control" required placeholder="nama_karyawan"><br>
                            
                            <label>Stock</label>
                            <input  value=<?= $obat['stock'];?> name="stock" type="teks" class="form-control" required placeholder="Stock"><br>
                            <input type="submit" class="btn btn-primary">
                            <button type="reset" class="btn btn-warning">Cancle</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include '../template/footer.php' ?>