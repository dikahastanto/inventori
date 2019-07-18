<?php include 'template/header.php' ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Insert Produk</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Isi Data Barang Dengan Benar</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="simpan_produk.php" method="post">
                            <input name="kode_produk" type="number" class="form-control" required placeholder="Kode Produk"><br>
                            <input name="nama_produk" type="text" class="form-control" required placeholder="Nama Produk"><br>
                            <select required name="jenis" class="form-control">
                                <option selected disabled>Pilih Jenis</option>
                                <option value="Jenis 1">Jenis 1</option>
                                <option value="Jenis 2">Jenis 2</option>
                            </select><br>
                            <input name="harga" type="number" class="form-control" required placeholder="Harga Produk"><br>
                            <input name="stock" type="number" class="form-control" required placeholder="Stok Produk"><br>
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