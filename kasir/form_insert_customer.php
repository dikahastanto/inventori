<?php include 'template/header.php' ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kasir</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Insert Customer</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="simpan_customer.php" method="post">
                                <input type="text" name="id_customer" class="form-control" placeholder="Id Customer"><br>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Customer"><br>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat Customer"><br>
                                <input type="text" name="diskon" class="form-control" placeholder="Diskon (Default 0)"><br>
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