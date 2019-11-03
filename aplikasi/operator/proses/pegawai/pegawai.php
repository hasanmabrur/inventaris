

<?php
session_start();
include"../../../../koneksi.php";
$id_pegawai		=	$_POST['id_pegawai'];
$nama_pegawai	=	$_POST['nama_pegawai'];
$nip			=	$_POST['nip'];
$alamat			=	$_POST['alamat'];
$cekuser=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
if(mysqli_num_rows($cekuser) > 0) {
     echo "<div align='center'>Kode Jenis Sudah ada Sudah! <a href='pegawai.php'>Back</a></div>";
   } else {
     if(!$nama_pegawai || !$nip || !$alamat) {
       echo "<div align='center'>Masih ada data yang kosong! <a href='daftar.php'>Back</a>";
     } else {

$in=mysqli_query($koneksi,"insert into pegawai values ('$id_pegawai','$nama_pegawai','$nip','$alamat')");
if($in){
	header('location:../../pegawai.php');
}else{
	echo "<div align='center'>Proses Gagal!</div>";
}}}
?>