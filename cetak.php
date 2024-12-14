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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cetak.css">
    <title>Print Data Record</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.17/jspdf.plugin.autotable.min.js"></script>
</head>
<body>  
    <h2 style="text-align: center;">Data Record</h2>
    <div class="tabel-section">
        <table border="1" id="data-table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Menu</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Total</th>
            </tr>

            <?php
                // Ambil data dari tabel orders
                $no = 1;
                $ambildata = mysqli_query($koneksi, "SELECT * FROM orders");
                while ($tampil = mysqli_fetch_array($ambildata)){
                    echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[nama]</td>
                        <td>$tampil[email]</td>
                        <td>$tampil[no_hp]</td>
                        <td>$tampil[menu_items]</td>
                        <td>$tampil[status_reservasi]</td>
                        <td>$tampil[tanggal]</td>
                        <td>$tampil[total_amount]</td>
                    </tr>";
                    $no++;
                }

                // Tutup koneksi
                mysqli_close($koneksi);
            ?>
        </table>
    </div>

    <div class="tombol-cetak">
        <button id="btnPrint" onclick="window.print()">Cetak</button>
    </div>

</body>
</html>
