<?php 
include '../../../../koneksi.php';
$id_pinjam = $_GET['id_pinjam'];
mysqli_query($koneksi,"delete from peminjaman where id_pinjam='$id_pinjam'");
header("location:../../peminjaman.php");

?>