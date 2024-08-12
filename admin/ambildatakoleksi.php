<!-- <?php
include 'koneksi.php';

$kodekol = $_POST['kode_kol'];

$sql = "SELECT * FROM koleksi WHERE kode_kol = '$kodekol'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data);
} else {
    echo "Gagal mengambil data koleksi.";
}
?> -->

<?php
include 'koneksi.php';

if(isset($_POST['kode_kol'])) {
    $kode_kol = $_POST['kode_kol'];

    $sql = "SELECT * FROM koleksi WHERE kode_kol = '$kode_kol'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $data_koleksi = mysqli_fetch_assoc($result);
        echo json_encode($data_koleksi);
    } else {
        echo json_encode(['error' => 'Gagal mengambil data koleksi.']);
    }
} else {
    echo json_encode(['error' => 'Kode Koleksi tidak diterima.']);
}
?>
