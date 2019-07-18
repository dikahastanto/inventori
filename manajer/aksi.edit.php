<?php 
    include '../config/koneksi.php';
    include 'template/header.php';
    $id = $_GET['username'];
    $sql = "SELECT * FROM tb_karyawan WHERE username= '$id'";
    $query = mysqli_query($konek,$sql);
    $karyawan = mysqli_fetch_array($query);
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Karyawan</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Form Edit Data karyawan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="proses_edit_karyawan.php" method="post">
                            <input readonly value=<?= $karyawan['username']; ?> name="username" type="teks" class="form-control" required placeholder="username"><br>
                            <input value=<?= $karyawan['id_karyawan'];?> name="id_karyawan" type="number" class="form-control" required placeholder="id karyawan"><br>
                            <input value=<?= $karyawan['nama_karyawan']; ?> name="nama_karyawan" type="teks" class="form-control" required placeholder="nama_karyawan"><br>
                            <input  value=<?= $karyawan['alamat_karyawan'];?> name="alamat_karyawan" type="teks" class="form-control" required placeholder="Alamat"><br>
                            <select  required name="jabatan" class="form-control">
                                <option disabled selected>jabatan</option>
                                <option selected value="<?= $karyawan['jabatan']; ?>"><?= $karyawan['jabatan']; ?></option>
                                <option value="Gudang">Gudang</option>
                                <option value="Kasir">Kasir</option>
                            </select><br>
                            <select  required name="jenis_kelamin" class="form-control">
                            <option disabled>Jenis kelamin</option>
                           <option selected value="<?= $karyawan['jenis_kelamin']; ?>"><?= $karyawan['jenis_kelamin']; ?></option>
                                <option >Laki-laki</option>
                                <option >Perempuan</option>
                            </select><br>
                            <input value=<?= $karyawan['no_tlp'];?> name="no_tlp" type="number" class="form-control" required placeholder="No Telphone"><br>

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