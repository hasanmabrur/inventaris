<?php
session_start();
include"../../../../koneksi.php";
$id_pinjam	=	$_POST['id_pinjam'];
$nama_peminjam	=	$_POST['nama_peminjam'];
$kode_barang	=	$_POST['kode_barang'];
$jumlah	=	$_POST['jumlah'];
$kondisi	=	$_POST['kondisi'];
$tgl_pinjam	=	$_POST['tgl_pinjam'];
$nama_pegawai	=	$_POST['nama_pegawai'];
$id_inventaris	=	$_POST['id_inventaris'];
$cekuser=mysqli_query($koneksi,"SELECT * FROM peminjaman WHERE id_pinjam = '$id_pinjam'");
if(mysqli_num_rows($cekuser) > 0) {
     echo "<div align='center'>Kode Jenis Sudah ada Sudah! <a href='../../peminjaman.php'>Back</a></div>";
   } else {
     if(!$nama_peminjam || !$jumlah || !$kondisi) {
       echo "<div align='center'>Masih ada data yang kosong! <a href='daftar.php'>Back</a>";
     } else {

$in=mysqli_query($koneksi,"insert into peminjaman values ('$id_pinjam','$nama_peminjam','$kode_barang','$jumlah','$kondisi','$tgl_pinjam','$nama_pegawai','$id_inventaris')");
if($in){
header('location:../../index.php');
}else{
	echo "<div align='center'>Proses Gagal!</div>";
}}}
?>

