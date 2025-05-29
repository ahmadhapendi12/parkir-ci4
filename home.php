<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kosan Mamah Nazwa</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #b3e5fc, #e1f5fe);
      color: #0d47a1;
      min-height: 100vh;
    }

    .hero {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      padding: 60px;
      flex-wrap: wrap;
    }

    .hero-text {
      max-width: 600px;
    }

    .hero-text h1 {
      font-size: 44px;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .hero-text p {
      font-size: 18px;
      margin-bottom: 30px;
    }

    .buttons a {
      text-decoration: none;
      background-color: #0d47a1;
      color: white;
      padding: 12px 24px;
      border-radius: 30px;
      margin-right: 20px;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .buttons a:hover {
      background-color: #1565c0;
    }

    .hero-img img {
      width: 280px;
      animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    .features {
      background-color: #ffffffd9;
      padding: 40px 60px;
      border-top: 2px solid #bbdefb;
    }

    .features h2 {
      font-size: 28px;
      margin-bottom: 20px;
    }

    .features ul {
      list-style: none;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .features li {
      flex: 1 1 250px;
      background-color: #e3f2fd;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
    }

    .features img {
      width: 40px;
      margin-right: 15px;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #e1f5fe;
      color: #0d47a1;
      margin-top: 40px;
    }

    @media (max-width: 768px) {
      .hero {
        flex-direction: column;
        text-align: center;
      }

      .hero-img {
        margin-top: 30px;
      }

      .buttons a {
        display: block;
        margin: 10px auto;
      }

      .features ul {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

  <section class="hero">
    <div class="hero-text">
      <h1>Selamat Datang di Kosan Mamah Nazwa</h1>
      <p>Kami menyediakan hunian nyaman dengan sistem parkir digital dan fasilitas lengkap untuk penghuni.</p>
      <div class="buttons">
        <a href="/parkir">Sistem Parkir</a>
        <a href="/penghasilan">Sewa Kamar</a>
      </div>
    </div>
    <div class="hero-img">
      <!-- Gambar rumah unik (ikon dashboard diganti) -->
      <img src="https://img.icons8.com/color/280/000000/home--v3.png" alt="Beranda Kosan" />
    </div>
  </section>

  <section class="features">
    <h2>Fasilitas Kosan</h2>
    <ul>
      <li><img src="https://img.icons8.com/fluency/48/wifi.png" alt="WiFi"/> WiFi Cepat Gratis</li>
      <li><img src="https://img.icons8.com/fluency/48/kitchen-room.png" alt="Dapur"/> Dapur Bersama</li>
      <li><img src="https://img.icons8.com/fluency/48/parking.png" alt="Parkir"/> Area Parkir Luas</li>
      <li><img src="https://img.icons8.com/fluency/48/air-conditioner.png" alt="AC"/> AC di Setiap Kamar</li>
      <li><img src="https://img.icons8.com/fluency/48/broom.png" alt="Kebersihan"/> Layanan Kebersihan</li>
    </ul>
  </section>
 <footer class="text-center mt-5 mb-4 text-muted small footer">
  <div class="mb-2">© 2025 - manajement kosan</div>
  <div class="social-icons">
    <a href="https://www.facebook.com/hpndy12" target="_blank"><i class="bi bi-facebook"></i></a>
    <a href="https://www.instagram.com/hpndy12?igsh=MWR6amppcmZ2dnRsYw==" target="_blank"><i class="bi bi-instagram"></i></a>
    <a href="https://youtube.com/@ahmadhapendi8046?si=Xx6JhaLa-8jjRkXX" target="_blank"><i class="bi bi-youtube"></i></a>
  </div>
</footer>
</body>
</html>
