<?php 
include '../../../../koneksi.php';
$id_inventaris = $_GET['id_inventaris'];
mysqli_query($koneksi,"delete from inventaris where id_inventaris='$id_inventaris'");
header("location:../../inventaris.php");

?>