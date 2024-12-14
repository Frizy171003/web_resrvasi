<?php
// register.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'web_uas');

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menambahkan pengguna baru
    $sql = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $username, $password, $email, $role);

    if ($stmt->execute()) {
        echo "<script>alert('Registrasi Berhasil, Silahkan Login');</script>";
    } else {
        echo "<script>alert('Registrasi Gagal');</script>" . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_register.css">
    <title>Registrasi</title>
</head>
<body>
    <div class="form-container">
        <h1>REGISTRASI</h1>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <select name="role" required>
                <option value="pelanggan">Pelanggan</option>
            </select>
            <button type="submit">Register</button>
        </form>
        <p>Sudah punya akun? <a href="flogin.php">Login di sini</a></p>
    </div>
</body>
</html>