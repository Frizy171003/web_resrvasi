<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: flogin.php");
    exit();
}

// Get user data from session
$user = $_SESSION['user'];

// Connect to the database
$koneksi = mysqli_connect("localhost", "root", "", "web_uas");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $menu = $_POST['menu'];
    $pesan = $_POST['pesan'];
    $tanggal = $_POST['tanggal'];

    // Insert data into database
    $query = "INSERT INTO pesan (nama, email, no_hp, menu, pesan, tanggal) VALUES ('$nama', '$email', '$no_hp', '$menu', '$pesan', '$tanggal')";
    $submit = mysqli_query($koneksi, $query);

    if ($submit) {
        // If data inserted successfully
        $message = "Pemesanan berhasil dicatat!";
    } else {
        // Error message if insertion fails
        $message = "Terjadi kesalahan saat menyimpan pemesanan.";
    }
} else {
    // Redirect to form page if no data is found
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Pesanan Dicatat</title>
</head>
<body>
  <div class="container">
    <h1>Pesanan Anda Telah Dicatat!</h1>
    <p><strong>Nama:</strong> <?php echo htmlspecialchars($nama); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>No HP:</strong> <?php echo htmlspecialchars($no_hp); ?></p>
    <p><strong>Menu yang Dipesan:</strong> <?php echo htmlspecialchars($menu); ?></p>
    <p><strong>Pesan Tambahan:</strong> <?php echo htmlspecialchars($pesan); ?></p>
    <p><strong>Tanggal Reservasi:</strong> <?php echo htmlspecialchars($tanggal); ?></p>

    <h3>Pembayaran:</h3>
    <p>Silakan scan QR Code untuk melanjutkan pembayaran DP sebesar Rp.20.000</p>
    <img src="gambar/qrminarko.jpg" alt="QR Code" style="max-width: 200px;">

    <a href="index.php" class="back-button">Kembali ke Halaman Utama</a>
  </div>

  <script src="script.js"></script>
</body>
</html>
