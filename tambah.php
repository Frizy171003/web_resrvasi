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

// Periksa apakah form disubmit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $menu = $_POST['menu'];
    $pesan = $_POST['pesan'];
    $tanggal = $_POST['tanggal'];

    // Query untuk menambahkan data baru
    $insert = mysqli_query($koneksi, "INSERT INTO pesan (nama, email, no_hp, menu, pesan, tanggal) VALUES ('$nama', '$email', '$no_hp', '$menu', '$pesan', '$tanggal')");

    if ($insert) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='admins.php';</script>";
    } else {
        echo "Data gagal ditambahkan: " . mysqli_error($koneksi);
    }
}

// Tutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah.css">
    <title>Tambah Data</title>
</head>
<body>
    <h2>Tambah Data</h2>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td><input type="text" name="no_hp" required></td>
            </tr>
            <tr>
                <td>Menu</td>
                <td><input type="text" name="menu" required></td>
            </tr>
            <tr>
                <td>Pesan</td>
                <td><input type="text" name="pesan" required></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <nav>
        <a href="admins.php">Back</a>
    </nav>
</body>
</html>
