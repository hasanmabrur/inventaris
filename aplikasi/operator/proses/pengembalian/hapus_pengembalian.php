<?php 
include '../../../../koneksi.php';
$id_pengembalian = $_GET['id_pengembalian'];
mysqli_query($koneksi,"delete from pengembalian where id_pengembalian='$id_pengembalian'");
header("location:../../pengembalian.php");

?>