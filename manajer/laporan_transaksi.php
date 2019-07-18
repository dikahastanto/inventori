
<?php
    include 'template/header.php';
    $query = mysqli_query($konek, "SELECT * FROM tb_transaksi");
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Laporan</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Laporan Transaksi</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <td>No Faktur</td>
                            <td>Nama Customer</td>
                            <td>Diskon Customer</td>
                            <td>Sub Total</td>
                            <td>Potongan</td>
                            <td>Total Transaksi</td>
                            <td>Kasir</td>
                            <td>Waktu</td>
                            <td>Action</td>
                        </thead>
                        <?php while ($data=mysqli_fetch_array($query)) :?>
                        <tr>
                            <td><?= $data['id_transaksi'] ?></td>
                            <td><?= $data['nama_customer'] ?></td>
                            <td><?= $data['diskon_customer'] ?></td>
                            <td><?= $data['sub_total'] ?></td>
                            <td><?= $data['potongan'] ?></td>
                            <td><?= $data['total_transaksi'] ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['time_stamp'] ?></td>
                            <td>
                                <a target="_blank" href="../kasir/cetak_faktur.php?no_faktur=<?= $data['id_transaksi']  ?>">
                                    <button class='btn btn-primary'>Lihat Faktur</button>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        </tr>
                    </table>
                    <a href="export_transaksi.php"><button class="btn btn-warning">Export To Excel</button></a>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
<?php include '../template/footer.php' ?>