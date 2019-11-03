<?php
session_start();
include"../../../../koneksi.php";
$id_barang		=	$_POST['id_barang'];
$nama_barang	=	$_POST['nama_barang'];
$kode_barang	=	$_POST['kode_barang'];
$keterangan		=	$_POST['keterangan'];

$cekuser=mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang = '$id_barang'");
if(mysqli_num_rows($cekuser) > 0) {
     echo "<div align='center'>Kode Jenis Sudah ada Sudah! <a href='barang.php'>Back</a></div>";
   } else {
     if(!$keterangan) {
       echo "<div align='center'>Masih ada data yang kosong! <a href='daftar.php'>Back</a>";
     } else {

$in=mysqli_query($koneksi,"insert into barang values ('$id_barang','$nama_barang','$kode_barang','$keterangan')");
if($in){
	header('location:../../barang.php');
}else{
	echo "<div align='center'>Proses Gagal!</div>";
}}}
?>