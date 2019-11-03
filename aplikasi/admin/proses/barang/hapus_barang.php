<?php 
include '../../../../koneksi.php';
$id_barang = $_GET['id_barang'];
mysqli_query($koneksi,"delete from barang where id_barang='$id_barang'");
header("location:../../barang.php");

?>