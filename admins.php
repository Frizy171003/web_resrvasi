<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: flogin.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "web_uas";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Get search term for reservations
$searchReservasi = isset($_GET['search_reservasi']) ? trim($_GET['search_reservasi']) : '';
// Get search term for users
$searchUser = isset($_GET['search_user']) ? trim($_GET['search_user']) : '';

// Query for reservations
if ($searchReservasi) {
    $queryReservasi = "SELECT * FROM orders WHERE nama LIKE ? OR email LIKE ? OR menu_items LIKE ?";
    $stmtReservasi = $koneksi->prepare($queryReservasi);
    $likeSearchReservasi = "%$searchReservasi%";
    $stmtReservasi->bind_param("sss", $likeSearchReservasi, $likeSearchReservasi, $likeSearchReservasi);
} else {
    $queryReservasi = "SELECT * FROM orders";
    $stmtReservasi = $koneksi->prepare($queryReservasi);
}
$stmtReservasi->execute();
$resultReservasi = $stmtReservasi->get_result();

// Query for users
if ($searchUser) {
    $queryUser = "SELECT * FROM users WHERE username LIKE ? OR email LIKE ? OR role LIKE ?";
    $stmtUser = $koneksi->prepare($queryUser);
    $likeSearchUser = "%$searchUser%";
    $stmtUser->bind_param("sss", $likeSearchUser, $likeSearchUser, $likeSearchUser);
} else {
    $queryUser = "SELECT * FROM users";
    $stmtUser = $koneksi->prepare($queryUser);
}
$stmtUser->execute();
$resultUser = $stmtUser->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admins.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Admin Panel</title>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to the Admin Panel</h1>
            <p>Manage the system with ease. View, edit, and delete reservations and user data.</p>
        </div>
    </section>

    <nav class="navbar">
        <h1>Admin Panel Minarko.</h1>
        <img class="logonavbar" src="gambar/logo.jpeg" alt="logo">
        <div class="navbar-nav">
            <a href="#data-reservasi">Data Reservasi</a>
            <a href="#data-user">Data User</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <!-- Data Reservasi Section -->
    <div class="content" id="data-reservasi">
        <h2>Data <span>Reservasi</span></h2>
        <div class="search-container">
            <form method="GET" action="admins.php">
                <input type="text" name="search_reservasi" placeholder="Search by Nama, Email, or Menu" value="<?php echo htmlspecialchars($searchReservasi); ?>">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="tabel-section">
            <table border="1">
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Menu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                while ($tampil = $resultReservasi->fetch_assoc()) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$tampil['nama']}</td>
                            <td>{$tampil['email']}</td>
                            <td>{$tampil['no_hp']}</td>
                            <td>{$tampil['tanggal']}</td>
                            <td>Rp " . number_format($tampil['total_amount'], 0, ',', '.') . "</td>
                            <td>{$tampil['menu_items']}</td>
                            <td>{$tampil['status_reservasi']}</td>
                            <td>
                                <a href='hapus.php?id={$tampil['id']}' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">
                                    <i data-feather='trash'></i>
                                </a>
                                <a href='ubah.php?id={$tampil['id']}'>
                                    <i data-feather='edit'></i>
                                </a>
                            </td>
                          </tr>";
                    $no++;
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Data User Section -->
    <div class="content" id="data-user">
        <h2>Data <span>User</span></h2>
        <div class="search-container">
            <form method="GET" action="admins.php">
                <input type="text" name="search_user" placeholder="Search by Username, Email, or Role" value="<?php echo htmlspecialchars($searchUser); ?>">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="tabel-section">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Dibuat Pada</th>
                    <th>Diubah Pada</th>
                    <th>Aksi</th>
                </tr>
                <?php
                while ($row = $resultUser->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['role']}</td>
                            <td>{$row['created_at']}</td>
                            <td>{$row['updated_at']}</td>
                            <td>
                                <a href='hapus_user.php?id={$row['id']}' onclick=\"return confirm('Yakin ingin menghapus user ini?');\">
                                    <i data-feather='trash'></i>
                                </a>
                            </td>
                          </tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>

<?php
// Close connection
$koneksi->close();
?>
