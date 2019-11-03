<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'ELEKTRONIK SEJAHTERA',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'LAPORAN PENJUALAN DAN PEMBELIAN BARANG',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->Cell(30,7,'Tabel Beli Barang',0,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'ID BELI',1,0);
$pdf->Cell(35,6,'KD Barang',1,0);
$pdf->Cell(90,6,'NAMA BARANG',1,0);
$pdf->Cell(35,6,'JUMLAH',1,1);

$pdf->SetFont('Arial','',10);

include "../../koneksi.php";
$mahasiswa = mysqli_query($connect, "select * from beli");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(30,6,$row['id_beli'],1,0);
    $pdf->Cell(35,6,$row['kd_barang'],1,0);
    $pdf->Cell(90,6,$row['nama_barang'],1,0);
    $pdf->Cell(35,6,$row['jumlah'],1,1); 
}
//--------------------------------------------------
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,7,'Tabel Jual Barang',0,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'ID BELI',1,0);
$pdf->Cell(30,6,'KD PELANGGAN',1,0);
$pdf->Cell(35,6,'KD Barang',1,0);
$pdf->Cell(60,6,'NAMA BARANG',1,0);
$pdf->Cell(35,6,'JUMLAH',1,1);

$pdf->SetFont('Arial','',10);

$mahasiswa = mysqli_query($connect, "select * from jual");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(30,6,$row['id_jual'],1,0);
    $pdf->Cell(30,6,$row['kd_pelanggan'],1,0);
    $pdf->Cell(35,6,$row['kd_barang'],1,0);
    $pdf->Cell(60,6,$row['nama_barang'],1,0);
    $pdf->Cell(35,6,$row['jumlah'],1,1); 
}

//--------------------------------------------------
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,7,'Tabel Stok Barang',0,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(35,6,'KD Barang',1,0);
$pdf->Cell(60,6,'NAMA BARANG',1,0);
$pdf->Cell(35,6,'JUMLAH',1,1);

$pdf->SetFont('Arial','',10);

$mahasiswa = mysqli_query($connect, "select * from stok");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(35,6,$row['kd_barang'],1,0);
    $pdf->Cell(60,6,$row['nama_barang'],1,0);
    $pdf->Cell(35,6,$row['jumlah'],1,1); 
}
$pdf->Cell(10,7,'',0,1);
$pdf->Output();
?>
