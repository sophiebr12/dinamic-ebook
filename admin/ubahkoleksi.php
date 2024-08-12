<?php
include 'koneksi.php';

$kodekol = $_POST['kode_kol'];
$judulkol = $_POST['judul_kol'];
$penulis = $_POST['penulis'];
$thnterbit = $_POST['tahun_terbit'];
$kategorikol = $_POST['kategori_kol'];
$des = $_POST['deskripsi'];

$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];

$upload_dir = 'assets/file/' . $file_name;

move_uploaded_file($file_tmp, $upload_dir);

$sql = "UPDATE koleksi SET judul_kol='$judulkol', penulis='$penulis', tahun_terbit='$thnterbit', kategori_kol='$kategorikol', deskripsi='$des', file='$file_name' WHERE kode_kol='$kodekol'";
mysqli_query($conn, $sql);
?>


<!-- <?php
include 'koneksi.php';

$kodekol = $_POST['kode_kol'];
$judulkol = $_POST['judul_kol'];
$penulis = $_POST['penulis'];
$thnterbit = $_POST['tahun_terbit'];
$kategorikol = $_POST['kategori_kol'];
$des = $_POST['deskripsi'];

$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];

$upload_dir = 'assets/file/' . $file_name;

move_uploaded_file($file_tmp, $upload_dir);

$sql = "UPDATE koleksi SET judul_kol='$judulkol', penulis='$penulis', tahun_terbit='$thnterbit', kategori_kol='$kategorikol', deskripsi='$des', file='$file_name' WHERE kode_kol='$kodekol'";
mysqli_query($conn, $sql);
?> -->


<!-- <?php
include 'koneksi.php';

   $kodekol= $_POST['kode_kol'] ;
   $judulkol= $_POST['judul_kol'] ;
   $penulis= $_POST['penulis'] ;
   $thnterbit=$_POST['tahun_terbit'] ;
   $kategorikol= $_POST['kategori_kol'] ;  
$sql = "update koleksi set judul_kol ='$judulkol',penulis = '$penulis',
tahun_terbit= '$thnterbit', kategori_kol = '$kategorikol' where kode_kol='$kodekol'";

mysqli_query($conn,$sql);


?> -->