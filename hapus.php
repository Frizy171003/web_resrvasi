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

// Periksa apakah parameter id telah diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data terkait dari tabel order_items terlebih dahulu
    $delete_items = "DELETE FROM order_items WHERE order_id = '$id'";
    if ($koneksi->query($delete_items) === TRUE) {
        // Setelah itu hapus data dari tabel orders
        $delete_order = "DELETE FROM orders WHERE id = '$id'";
        if ($koneksi->query($delete_order) === TRUE) {
            // Setelah data dihapus, redirect ke halaman admin dengan pesan sukses
            echo "<script>
                    alert('Data berhasil dihapus.');
                    window.location.href = 'admins.php';
                  </script>";
        } else {
            echo "Error: " . $delete_order . "<br>" . $koneksi->error;
        }
    } else {
        echo "Error: " . $delete_items . "<br>" . $koneksi->error;
    }
} else {
    // Jika parameter id tidak ditemukan
    echo "<script>
            alert('ID tidak ditemukan!');
            window.location.href = 'admins.php';
          </script>";
}

// Tutup koneksi
$koneksi->close();
?>
