<?php
session_start();
include"../../../../koneksi.php";
$id_inventaris		=	$_POST['id_inventaris'];
$nama				=	$_POST['nama'];
$kondisi			=	$_POST['kondisi'];
$keterangan			=	$_POST['keterangan'];
$jumlah				=	$_POST['jumlah'];
$kode_barang		=	$_POST['kode_barang'];
$tanggal_register	=	$_POST['tanggal_register'];
$kode_ruang			=	$_POST['kode_ruang'];
$kode_inventaris	=	$_POST['kode_inventaris'];
$nama_pegawai		=	$_POST['nama_pegawai'];
$cekuser=mysqli_query($koneksi,"SELECT * FROM inventaris WHERE id_inventaris = '$id_inventaris'");
if(mysqli_num_rows($cekuser) > 0) {
     echo "<div align='center'>id_inventaris Sudah ada Sudah! <a href='../../inventaris.php'>Back</a></div>";
   } else {
     if(!$nama || !$kondisi || !$keterangan) {
       echo "<div align='center'>Masih ada data yang kosong! <a href='../../inventaris.php.php'>Back</a>";
     } else {

$in=mysqli_query($koneksi,"insert into inventaris values ('$id_inventaris','$nama','$kondisi','$keterangan','$jumlah','$kode_barang','$tanggal_register','$kode_ruang','$kode_inventaris','$nama_pegawai')");
if($in){
	header('location:../../inventaris.php');
}else{
	echo "<div align='center'>Proses Gagal!</div>";
}}}
?>