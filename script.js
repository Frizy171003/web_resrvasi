document.addEventListener("DOMContentLoaded", function () {
  const hero = document.querySelector(".hero");
  const backgrounds = [
    "url(gambar/bg_oke.jpg)",
    "url(gambar/bg2.jpg)",
    "url(gambar/bg3.jpg)",
  ]; // Daftar background yang akan digunakan, tambahkan lebih jika diperlukan

  let currentBgIndex = 0;

  function changeBackground() {
    hero.style.backgroundImage = backgrounds[currentBgIndex];
    currentBgIndex = (currentBgIndex + 1) % backgrounds.length; // Berganti ke background berikutnya dalam daftar
    setTimeout(changeBackground, 2000); // Mengulang setiap 3 detik
  }

  // Memanggil fungsi untuk memulai perubahan background
  changeBackground();
});

document.addEventListener("DOMContentLoaded", function () {
  const sections = document.querySelectorAll(".about, .menu, .kontak");

  // Buat observer baru
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("fade-up");
        } else {
          entry.target.classList.remove("fade-up");
        }
      });
    },
    {
      threshold: 0.1, // Saat setengah dari section terlihat dalam viewport
    }
  );

  // Amati setiap section
  sections.forEach((section) => {
    observer.observe(section);
  });
});
