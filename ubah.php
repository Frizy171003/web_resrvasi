<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "web_uas";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Periksa apakah ada data yang akan diubah
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil data yang akan diubah
    $result = mysqli_query($koneksi, "SELECT * FROM orders WHERE id='$id'");
    $data = mysqli_fetch_array($result);

    // Jika form disubmit, update data
    if (isset($_POST['update'])) {
        $email = $_POST['email'];
        $no_hp = $_POST['no_hp'];
        $menu_items = $_POST['menu_items']; // Mengambil daftar menu
        $tanggal = $_POST['tanggal'];
        $status_reservasi = $_POST['status_reservasi']; // Mengambil status reservasi
        $total_amount = $_POST['total_amount']; // Mengambil total_amount
        
        // Update data ke tabel orders
        $update = mysqli_query($koneksi, "UPDATE orders SET email='$email', no_hp='$no_hp', menu_items='$menu_items', tanggal='$tanggal', status_reservasi='$status_reservasi', total_amount='$total_amount' WHERE id='$id'");
        
        if ($update) {
            echo "<script>alert('Data berhasil di Update'); window.location.href='admins.php';</script>";
        } else {
            echo "<script>alert('Data Gagal Diupdate');</script> " . mysqli_error($koneksi);
        }
    }
} else {
    echo "ID tidak ditemukan!";
    exit;
}

// Tutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ubah.css">
    <title>Ubah Data</title>
</head>
<body>
    <h2>Ubah Data</h2>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Nama</td>
                <td>: <?php echo $data['nama']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $data['email']; ?>"></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="no_hp" value="<?php echo $data['no_hp']; ?>"></td>
            </tr>
            <tr>
                <td>Menu</td>
                <td><input type="text" name="menu_items" value="<?php echo $data['menu_items']; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal" value="<?php echo $data['tanggal']; ?>"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status_reservasi">
                        <option value="dibayar" <?php echo ($data['status_reservasi'] == 'dibayar') ? 'selected' : ''; ?>>Dibayar</option>
                        <option value="belum dibayar" <?php echo ($data['status_reservasi'] == 'belum dibayar') ? 'selected' : ''; ?>>Belum Dibayar</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Total Amount</td>
                <td><input type="text" name="total_amount" value="<?php echo $data['total_amount']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <nav>
        <a href="admins.php">Back</a>
    </nav>
</body>
</html>
