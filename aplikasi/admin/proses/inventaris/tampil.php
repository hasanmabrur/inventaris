 <?php
//buat dulu skrip koneksi kedatabase
include"../../../../koneksi.php";
//ingat, sebelumnya saya sudah memiliki data yang tersimpan di database

           if(isset($_POST['cari'])){ //Jika terpasang postingan dari "cari" maka
           $cari=$_POST['cari'];
           $cari=preg_replace("#[^a-z0-9]#i"," ", $cari);//fungsi ini untuk menghindari karakter selain dari huruf dan angka dengan mengubahnya menjadi spasi, misalkan karakter ' maka akan berubah menjadi space
           $data_pencarian=$koneksi->query("SELECT * FROM inventaris WHERE id_inventaris LIKE '%$cari%' ");
           foreach($data_pencarian as $result){
           echo $result['id_inventaris']."<br />";


          }
          }else{}
?>
 <form  method="post"> 
        <input  type="text"  name="cari"  placeholder="Search" required>
        <input  type="submit" size="22" value="Cari"> 
</form>