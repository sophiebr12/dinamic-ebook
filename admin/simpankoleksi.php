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

$sql = "INSERT INTO koleksi VALUES ('$kodekol','$judulkol','$penulis','$thnterbit','$kategorikol','$des','$file_name')";
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

$sql = "insert into koleksi values('$kodekol','$judulkol','$penulis','$thnterbit','$kategorikol','$des','$file')";
mysqli_query($conn, $sql);
?> -->

// $kodekol = $_POST['kode_kol'];
// $judulkol = $_POST['judul_kol'];
// $penulis = $_POST['penulis'];
// $thnterbit = $_POST['tahun_terbit'];
// $kategorikol = $_POST['kategori_kol'];
// $des = $_POST['deskripsi'];

// $namaFile = $_FILES['file']['name'];
// $x = explode(".", $namaFile);
// $ekstensiFile = strtolower(end($x));
// // $ukuranFile = $_FILES['file']['name'];
// $file_tmp = $_FILES['file']['tmp_name'];

// $dirUpload = 'assets/file/';
// $linkBerkas = $dirUpload.$namaFile;

// $terupload = move_uploaded_file($file_tmp, $linkBerkas);
// $dataArr = array(
//     'kode_kol' => $kodekol,
//     'judul_kol' => $judulkol,
//     'penulis' => $penulis,
//     'tahun_terbit' => $thnterbit,
//     'kategori_kol' => $kategorikol,
//     'deskripsi' => $des,
//     'file' => $linkBerkas,
// );

// if($terupload && (insertData($dataArr) == 1)){
//     echo "upload berhasil";
//     header("Location: tabelkoleksi.php", true, 301);
// }else{
//     echo "Upload Gagal";
//     header("Location: tabelkoleksi.php", true, 301);
// // }











// $file = $_FILES['file']['name'];
// $ekstensi_file = array('pdf');
// $folder = '../assets/file/';
// $source = $_FILES['file']['tmp_name'];
// // $ekstensi = strtolower(end(explode('.', $_FILES['file']['name'])));
// $file_name_parts = explode('.', $_FILES['file']['name']);
// $ekstensi = strtolower(end($file_name_parts));
// $ekstensi_ok = in_array($ekstensi, $ekstensi_file);

// ...

// if (!($ekstensi_ok)) {
//     header("location:tabelkoleksi.php?pesan=gagal");
// } else {
//     move_uploaded_file($source, $folder . $file);

//     $sql = "INSERT INTO koleksi VALUES('$kodekol','$judulkol','$penulis','$thnterbit','$kategorikol','$des','$file')";

//     if (mysqli_query($conn, $sql)) {
//         // Logging berhasil
//         error_log("Data koleksi berhasil disimpan");
//     } else {
//         // Logging kesalahan
//         error_log("Error: " . $sql . "\n" . mysqli_error($conn));
//     }

//     header("location:tabelkoleksi.php");
// }

// if (!($ekstensi_ok)) {
//     header("location:tabelkoleksi.php?pesan=gagal");
// } else {
//     move_uploaded_file($source, $folder . $file);
//     $sql = "insert into koleksi values('$kodekol','$judulkol','$penulis','$thnterbit','$kategorikol','$des','$file')";
//     mysqli_query($conn, $sql);
//     header("location:tabelkoleksi.php");
// }