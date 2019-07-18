<?php

// session_start();
// if (!isset ($_SESSION['logged-in']) AND
//     !isset ($_SESSION['username']) AND
//     !isset ($_SESSION['password'])  ) {
//   //die ("Anda Belum Login , Klik <a href=../index.php> Disini<a> Untuk Log In");
//   die("<script type=text/Javascript> alert('Anda Harus Login !')
//           window.location = 'index.php';
//         </script>");
// }else {

// }


include '../config/koneksi.php';
$kode = $_GET['no_faktur'];

$sql = "SELECT * FROM tb_transaksi WHERE id_transaksi='$kode'";
$query = mysqli_query($konek,$sql);
$data = mysqli_fetch_array($query);
$id_transaksi = $data['id_transaksi'];

$sql_barang = "SELECT * FROM tb_detail_transaksi WHERE id_transaksi = '$id_transaksi'";
$query_barang = mysqli_query($konek,$sql_barang);

require('Fpdf/fpdf.php');
$pdf=new FPDF('P','cm','A4');
$pdf->AddPage();
// tempat mengganti template png -- Dika Hastanto
$pdf->Image('Fpdf/format_faktur.png',0,0,21,30);


$pdf->SetFont('Arial','',12);
$pdf->Cell(0,3,$data['id_transaksi'],0,0,'R');

$pdf->Ln();
$pdf->Cell(0,-1.9,$data['time_stamp'],0,0, 'R');

$pdf->Ln();
$pdf->Cell(0,2.8,'',0,0, 'L');
$pdf->Ln();
$pdf->Cell(0,1,$data['nama_customer'],0,0, 'L');
$pdf->Ln();

$pdf->Cell(5,1,'Nama Barang',1,0,'C');
$pdf->Cell(5,1,'Harga',1,0,'C');
$pdf->Cell(5,1,'Diskon',1,0,'C');
$pdf->Cell(4,1,'Jumlah',1,0,'C');
$pdf->Ln();
    while($data_barang=mysqli_fetch_array($query_barang)) {
        $pdf->Cell(5,1,$data_barang['nama_barang'],1,0,'C');
        $pdf->Cell(5,1,$data_barang['harga'],1,0,'C');
        $pdf->Cell(5,1,$data_barang['diskon'].' %',1,0,'C');
        $pdf->Cell(4,1,$data_barang['jumlah'],1,0,'C');
        $pdf->Ln();
    }
$pdf->Ln();
$pdf->Cell(0,1,'Sub Total            : Rp.'.$data['sub_total'].',-',0,0, 'L');
$pdf->Ln();
$pdf->Cell(0,1,'Potongan            : Rp.'.$data['potongan'].',-',0,0, 'L');
$pdf->Ln();
$pdf->Cell(0,1,'Total Transaksi   : Rp.'.$data['total_transaksi'].',-',0,0, 'L');
$pdf->Ln();

$pdf->Cell(17,1,'Hormat Kami',0,0, 'R');
$pdf->Cell(12,1,'',0,0, 'R');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(17,1,$data['username'],0,0, 'R');


$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(17,1,'Mohon maaf bila ada kesalahan. Jika ada kesalahan silahkan laporkan kepada kami.',0,0, 'C');


$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(17,1,'Terimakasih',0,0, 'C');


$pdf->Output();


?>
