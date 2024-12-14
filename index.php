<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- icons -->
     <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="icon/x-icon" href="gambar/minarko_red.png">
    <title>Web Minarko</title>
</head>
<body>

<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header("Location: flogin.php");
    exit();
}

// Ambil data pengguna dari sesi
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Web Minarko</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <h2>Minarko.</h2>
        <img class="logonavbar" src="gambar/logo.jpeg">
        <div class="navbar-nav" id="navbar-nav">
            <a href="#" id="home-nav">Home</a>
            <a href="#about" id="about-nav">About Us</a>
            <a href="#menu" id="menu-nav">Menu</a>
            <a href="#pesan" id="kontak-nav">Pesan</a>
            <a href="logout.php" id="logout-nav">Logout</a>
        </div>
        <div class="welcome-message">
            <p>Selamat datang, <strong><?php echo htmlspecialchars($user['username']); ?></strong>!</p>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Halo, <span><?php echo htmlspecialchars($user['username']); ?></span>!</h1>
            <p>Ayo Nikmati Cita Rasa Lezat Dengan Harga Bersahabat</p>
            <a href="#kontak" class="cta">Beli Sekarang</a>
        </main>
    </section>
    <!-- about -->

    <section class="about" id="about">
        <h2>Tentang <span>Kami</span></h2>
        <div class="row">

            <div class="content">
                <h3>Lokasi</h3>
                <p>Restoran Minarko ini terletak di Jl. Tapak Tilas, Sungai Bangek, Padang, Provinsi Sumatera Barat. </p>
                <p>Restoran ini pertama dibuka pada tanggal 15 Agustus 2022.</p>
            </div>

            <div class="content">
                <h3>Visi</h3>
                <p>Menjadi pilihan utama para pecinta kuliner mie pedas di Indonesia terutama di ranah minang dengan menyuguhkan pengalaman kuliner yang unik, berkualitas, dan penuh tantangan.</p>
            </div>
        </div>
        <div class="row2">
            <div class="content" id="misi">
                <h3>Misi</h3>
                <p>Menyediakan mie goreng dan mie rebus berkualitas dengan varian rasa pedas yang beragam. Terus berinovasi dalam menciptakan tingkatan pedas yang unik, memberikan pelayanan ramah dan profesional, serta memastikan tempat yang nyaman dan bersih bagi pelanggan. Mendukung produk lokal, memberdayakan masyarakat sekitar, dan menjaga standar kesehatan dan keamanan pangan untuk menciptakan pengalaman makan yang tak terlupakan.</p>
            </div>

        </div>
    </section>

    <section class="menu" id="menu">
        <h2>Menu <span>Kami</span></h2>
        <p>"Rasakan ledakan rasa dengan setiap suapan dari menu kami yang menggugah selera, siap menghangatkan hari Anda dan membuat Anda ketagihan!"</p>
        <div class="row">
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/goreng.png" >
                <h3 class="menu-card-title">- Mie Goreng  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Rasakan sensasi menggigit Mie Goreng Pedas, lezatnya menggugah selera dan pedasnya bikin nagih!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/kuah.png" >
                <h3 class="menu-card-title">- Mie Kuah -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Nikmati kelezatan mie kuah pedas yang menggugah selera, siap memanjakan lidah Anda!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/mager.png" >
                <h3 class="menu-card-title">- Mie Mager -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Rasakan kenikmatan Mie Mager yang lezat dan praktis untuk bangkitkan semangatmu!"</div>
            </div>
            <div class="menu-card" > 
                <img class="menu-card-image" src="gambar/algojo.png">
                <h3 class="menu-card-title">- Ayam Lado Ijo  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Rasakan Sensasi Pedas Menggoda Ayam Lado Ijo, Lezatnya Menggugah Selera dan Bikin Ketagihan!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/geprek.png" >
                <h3 class="menu-card-title">- Ayam Geprek  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Geprek Ayamnya Nendang Banget, Pedasnya Bikin Nagih Terus!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/pecel.png" >
                <h3 class="menu-card-title">- Pecel Ayam  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Pecel Ayamnya Mantul Abis, Bumbu Khasnya Bikin Kamu Makan Terus Tanpa Henti!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/bakar.png" >
                <h3 class="menu-card-title">- Ayam Bakar  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Ayam Bakar Kita, Bumbunya Meresap Sampai Ke Tulang! Rasanya Dijamin Bikin Kamu Nambah Lagi dan Lagi!"</div>
            </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/slengekan.png" >
                <h3 class="menu-card-title">- Nasi Slengekan  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Nasi Slengekan, Paduan Sempurna Antara Pedas, Gurih, dan Nikmat yang Bikin Lidah Bergoyang dan Pengen Lagi!"</div>
                </div>
            <div class="menu-card" >
                <img class="menu-card-image" src="gambar/dadar.png" >
                <h3 class="menu-card-title">- Nasi Dadar  -</h3>
                <div class="overlay left"></div>
                <div class="overlay right"></div>
                <div class="text">"Nasi Dadar, Gurihnya Nyata, Gaya Hidupmu Makin Hits dengan Setiap Gigitannya yang Memikat!"</div>
                </div>
        </div>
    </section>

<section class="pesan" id="pesan">  
    <form id="orderForm" method="POST" action="process_order.php">
    <div class="row">
        <h2><span>Reservasi</span></h2>

        <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" name="nama" id="nama" placeholder="Nama" value="<?php echo htmlspecialchars($user['username']); ?>" readonly>
        </div>

        <div class="input-group">
            <i data-feather="mail"></i>
            <input type="text" name="email" id="email" placeholder="Email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
        </div>
        
        <div class="input-group">
            <i data-feather="phone"></i>
            <input type="text" name="no_hp" id="no_hp" placeholder="No HP">
        </div>
        
        <div class="input-group">
            <i data-feather="calendar"></i>
            <input type="date" name="tanggal" id="tanggal" placeholder="Tanggal Reservasi">
        </div>
    </div>

    <ul class="menu-list">
        <!-- Mie Goreng -->
        <li class="menu-item">
            <label for="MieGorengQty">Mie Goreng (Rp 9,000)</label>
            <input type="number" id="MieGorengQty" name="MieGorengQty" placeholder="Jumlah" min="0" max="10" style="width: 60px;" oninput="updatePrice()">
            <span id="MieGorengPrice">Rp 0</span>
        </li>
        
        <!-- Mie Kuah -->
        <li class="menu-item">
            <label for="MieKuahQty">Mie Kuah (Rp 11,000)</label>
            <input type="number" id="MieKuahQty" name="MieKuahQty" placeholder="Jumlah" min="0" max="10" style="width: 60px;" oninput="updatePrice()">
            <span id="MieKuahPrice">Rp 0</span>
        </li>

        <!-- Mie Mager -->
        <li class="menu-item">
            <label for="MieMagerQty">Mie Mager (Rp 17,000)</label>
            <input type="number" id="MieMagerQty" name="MieMagerQty" placeholder="Jumlah" min="0" max="10" style="width: 60px;" oninput="updatePrice()">
            <span id="MieMagerPrice">Rp 0</span>
        </li>
        
        <!-- Ayam Lado Ijo -->
        <li class="menu-item">
            <label for="AyamLadoIjoQty">Ayam Lado Ijo (Rp 14,000)</label>
            <input type="number" id="AyamLadoIjoQty" name="AyamLadoIjoQty" placeholder="Jumlah" min="0" max="10" style="width: 60px;" oninput="updatePrice()">
            <span id="AyamLadoIjoPrice">Rp 0</span>
        </li>

        <!-- Ayam Geprek -->
        <li class="menu-item">
            <label for="AyamGeprekQty">Ayam Geprek (Rp 16,000)</label>
            <input type="number" id="AyamGeprekQty" name="AyamGeprekQty" placeholder="Jumlah" min="0" max="10" style="width: 60px;" oninput="updatePrice()">
            <span id="AyamGeprekPrice">Rp 0</span>
        </li>
        
        <!-- Pecel Ayam -->
        <li class="menu-item">
            <label for="PecelAyamQty">Pecel Ayam (Rp 14,000)</label>
            <input type="number" id="PecelAyamQty" name="PecelAyamQty" placeholder="Jumlah" min="0" max="10" style="width: 60px;" oninput="updatePrice()">
            <span id="PecelAyamPrice">Rp 0</span>
        </li>
        
        <!-- Ayam Bakar -->
        <li class="menu-item">
            <label for="AyamBakarQty">Ayam Bakar (Rp 15,000)</label>
            <input type="number" id="AyamBakarQty" name="AyamBakarQty" placeholder="Jumlah" min="0" max="10" style="width: 60px;" oninput="updatePrice()">
            <span id="AyamBakarPrice">Rp 0</span>
        </li>
        
        <!-- Nasi Slengekan -->
        <li class="menu-item">
            <label for="NasiSlengekanQty">Nasi Slengekan (Rp 12,000)</label>
            <input type="number" id="NasiSlengekanQty" name="NasiSlengekanQty" placeholder="Jumlah" min="0" max="10" style="width: 60px;" oninput="updatePrice()">
            <span id="NasiSlengekanPrice">Rp 0</span>
        </li>

        <!-- Nasi Dadar -->
        <li class="menu-item">
            <label for="NasiDadarQty">Nasi Dadar (Rp 9,000)</label>
            <input type="number" id="NasiDadarQty" name="NasiDadarQty" placeholder="Jumlah" min="0" max="10" style="width: 60px;" oninput="updatePrice()">
            <span id="NasiDadarPrice">Rp 0</span>
        </li>
    </ul>
    
    <div class="total-price">
        <h3>Total: Rp <span id="totalPrice">0</span></h3>
    </div>
    
    <input type="hidden" name="total_amount" id="totalAmount" value="0">
    <button type="submit" name="submit" class="btn">Kirim</button>
</form>

</section>  

<section class="end">
    <div class="fin">
        <p>2024 ©Minarko. All rights reserved.</p>
        <i data-feather="instagram" class="ig"></i>
        <i data-feather="facebook" class="fb"></i>
        <i data-feather="twitter" class="tw"></i>        
    </div>

</section>

<script src="order.js"></script>



<script src="script.js"></script>>

<script>
    feather.replace();
    </script>

</body>
</html>
