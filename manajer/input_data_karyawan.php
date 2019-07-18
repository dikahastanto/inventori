<?php include 'template/header.php' ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Insert Data karyawan</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Form Input Data Karyawan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="simpan_karyawan.php" method="post">
                            <input name="username" type="text" class="form-control" required placeholder="username"><br>
                            <input name="id_karyawan" type="number" class="form-control" required placeholder="id karyawan"><br>
                            <input name="nama_karyawan" type="teks" class="form-control" required placeholder="nama_karyawan"><br>
                            <input name="alamat_karyawan" type="teks" class="form-control" required placeholder="Alamat"><br>
                            <select required name="jabatan" class="form-control">
                                <option selected disabled>jabatan</option>
                                <option value="Gudang">Gudang</option>
                                <option value="Kasir">Kasir</option>
                            </select><br>
                            <select required name="jenis_kelamin" class="form-control">
                                <option selected disabled>Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select><br>
                            <input name="no_tlp" type="number" class="form-control" required placeholder="No Telphone"><br>
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