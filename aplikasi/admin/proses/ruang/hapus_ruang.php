<?php 
include '../../../../koneksi.php';
$id_ruang = $_GET['id_ruang'];
mysqli_query($koneksi,"delete from ruang where id_ruang='$id_ruang'");
header("location:../../ruang.php");

?>