<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pemesanan_kamar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Koneksi ke database gagal: " . $conn->connect_error);
}

$timezone = new DateTimeZone('Asia/Makassar');
$now = new DateTime('now', $timezone);
$currentDateTime = $now->format('Y-m-d H:i:s');

if (isset($_POST['input']) && !empty($_POST['input'])) {
  $input = $_POST['input'];
  $name = $_POST['name'];
  $age = $_POST['age'];

  if ($age < 18) {
    header("Location: ../../index.php?error=maaf belum cukup umur");
    exit();
  }

  $stmt = $conn->prepare("INSERT INTO pesanan (nama, kamar, umur, total_biaya, jumlah_hari, tanggal) VALUES (?, ?, ?, ?, ?, ?)");

  for ($i = 0; $i < count($input); $i++) {
    $kamar = $input[$i][0];
    $biaya = $input[$i][1];
    $hari = $input[$i][2];

    $stmt->bind_param("ssssss", $name, $kamar, $age, $biaya, $hari, $currentDateTime);
    $stmt->execute();
  }

  $stmt->close();
  $conn->close();

  header("Location: ../../");
  exit();
} else {
  header("Location: ../../index.php?error=mohon isi semua input");
  exit();
}
?>
