<!-- <?php
include 'koneksi.php';

$kodekol=$_POST['kode_kol'];
$sql = "delete from  koleksi where kode_kol ='".$kodekol."'";
mysqli_query($conn,$sql);
?> -->


<?php
include 'koneksi.php';

$kodekol = $_POST['kode_kol'];
// $deskripsi = $_POST['deskripsi'];

// Ambil informasi file sebelum menghapus data
$sqlFileInfo = "SELECT file FROM koleksi WHERE kode_kol = '$kodekol' ";
$resultFileInfo = mysqli_query($conn, $sqlFileInfo);
$fileInfo = mysqli_fetch_assoc($resultFileInfo);
$filePath = $fileInfo['file'];

// Hapus file jika ada
if (!empty($filePath) && file_exists($filePath)) {
    unlink($filePath);
}

// Hapus data dari database
$sqlDelete = "DELETE FROM koleksi WHERE kode_kol = '$kodekol' ";
mysqli_query($conn, $sqlDelete);

echo "Data dan file berhasil dihapus";
?>
