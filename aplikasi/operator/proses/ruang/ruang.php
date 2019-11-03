<?php
session_start();
include"../../../../koneksi.php";
$id_ruang	=	$_POST['id_ruang'];
$nama_ruang	=	$_POST['nama_ruang'];
$kode_ruang	=	$_POST['kode_ruang'];
$keterangan	=	$_POST['keterangan'];
$cekuser=mysqli_query($koneksi,"SELECT * FROM ruang WHERE id_ruang = '$id_ruang'");
if(mysqli_num_rows($cekuser) > 0) {
     echo "<div align='center'>Kode Jenis Sudah ada Sudah! <a href='jenis.php'>Back</a></div>";
   } else {
     if(!$nama_ruang || !$kode_ruang || !$keterangan) {
       echo "<div align='center'>Masih ada data yang kosong! <a href='daftar.php'>Back</a>";
     } else {

$in=mysqli_query($koneksi,"insert into ruang values ('$id_ruang','$nama_ruang','$kode_ruang','$keterangan')");
if($in){
	header('location:../../ruang.php');
}else{
	echo "<div align='center'>Proses Gagal!</div>";
}}}
?>