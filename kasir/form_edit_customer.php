<?php 

    include 'template/header.php';

    $id_customer = $_GET['id'];
    $sql = "SELECT * FROM tb_customer WHERE id_customer = '$id_customer'";
    $query = mysqli_query($konek,$sql);
    $data = mysqli_fetch_array($query);
    
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
                <div class="panel-heading">Edit Data Custoemr</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="edit_proses_customer.php" method="post">
                                <label>Id Customer</label>
                                <input value="<?= $data['id_customer']  ?>" readonly type="text" name="id_customer" class="form-control" placeholder="Id Customer"><br>
                                
                                <label>Nama Customer</label>
                                <input value="<?= $data['nama']  ?>" type="text" name="nama" class="form-control" placeholder="Nama Customer"><br>
                                
                                <label>Alamat</label>
                                <input value="<?= $data['alamat']  ?>" type="text" name="alamat" class="form-control" placeholder="Nama Customer"><br>
                                
                                <input type="submit"  class="btn btn-primary" value="Simpan">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php include '../template/footer.php' ?>