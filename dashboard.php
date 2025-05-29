<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Parkir - Kosan Mamah Nazwa</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #e0f7fa, #f3e5f5);
      color: #1a237e;
    }

    .wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 240px;
      background: linear-gradient(to bottom, #283593, #3949ab);
      color: white;
      padding: 20px;
      display: flex;
      flex-direction: column;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
    }

    .sidebar h3 {
      margin-top: 0;
      margin-bottom: 30px;
      font-size: 22px;
      text-align: center;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      margin-bottom: 15px;
      display: block;
      padding: 12px 16px;
      border-radius: 10px;
      font-weight: 500;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .sidebar a:hover {
      background-color: rgba(255, 255, 255, 0.1);
      transform: translateX(5px);
    }

    .main-content {
      flex-grow: 1;
      padding: 30px;
    }

    h2 {
      text-align: center;
      font-size: 26px;
      margin-bottom: 25px;
      color: #1a237e;
    }

    form {
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      margin-bottom: 40px;
    }

    label {
      display: block;
      font-weight: 600;
      margin-top: 18px;
    }

    select, input[type="text"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #c5cae9;
      border-radius: 8px;
      margin-top: 8px;
      font-size: 15px;
      background-color: #f9f9fc;
      transition: 0.3s;
    }

    select:focus, input:focus {
      border-color: #7986cb;
      outline: none;
      background-color: #ffffff;
    }

    button.submit-btn {
      margin-top: 25px;
      background-color: #5c6bc0;
      color: white;
      padding: 14px 30px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    button.submit-btn:hover {
      background-color: #3f51b5;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 12px;
    }

    th, td {
      padding: 16px;
      text-align: center;
      background: white;
    }

    th {
      background: #5c6bc0;
      color: white;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    tr {
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      border-radius: 10px;
      overflow: hidden;
    }

    tr:nth-child(even) td {
      background: #f3f4fa;
    }

    .search-form {
      margin-top: 30px;
      text-align: center;
    }

    .search-form input {
      padding: 12px;
      width: 260px;
      border: 1px solid #c5cae9;
      border-radius: 8px;
      font-size: 14px;
    }

    .search-form button {
      padding: 12px 22px;
      margin-left: 10px;
      background-color: #43a047;
      border: none;
      color: white;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .search-form button:hover {
      background-color: #388e3c;
    }

    a.keluar-link {
      color: #e53935;
      font-weight: bold;
      text-decoration: none;
    }

    a.keluar-link:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .wrapper {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        flex-direction: row;
        justify-content: space-around;
        padding: 10px 0;
      }

      .sidebar h3 {
        display: none;
      }

      .sidebar a {
        padding: 10px;
        font-size: 13px;
      }

      table, thead, tbody, th, td, tr {
        display: block;
      }

      tr {
        margin-bottom: 20px;
        background: white;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      }

      td, th {
        text-align: left;
        padding: 12px;
      }

      th {
        background: #3f51b5;
        color: white;
      }
    }
  </style>
</head>
<body>

<div class="wrapper">
  <div class="sidebar">
    <h3>Parkir Mamah Nazwa</h3>
    <a href="/">Beranda</a>
    <a href="/parkir">Input Kendaraan</a>
    <a href="/penghasilan">Laporan</a>
    <a href="/logout">Logout</a>
  </div>

  <div class="main-content">
    <h2>Input Kendaraan Masuk</h2>
    <form action="/simpan" method="post">
      <label for="jenis_kendaraan">Jenis Kendaraan:</label>
      <select name="jenis_kendaraan" id="jenis_kendaraan" required>
        <option value="">-- Pilih Jenis --</option>
        <option>Motor</option>
        <option>Mini Bus</option>
        <option>Truck</option>
        <option>Bus</option>
      </select>

      <label for="no_polisi">No Polisi:</label>
      <input type="text" name="no_polisi" id="no_polisi" placeholder="Contoh: A 1234 BC" required />

      <button type="submit" class="submit-btn">Simpan</button>
    </form>

    <h2>Daftar Kendaraan Terparkir</h2>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>No Polisi</th>
          <th>Jenis</th>
          <th>Masuk</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($kendaraan as $i => $k): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= htmlspecialchars($k['no_polisi']) ?></td>
          <td><?= htmlspecialchars($k['jenis_kendaraan']) ?></td>
          <td><?= htmlspecialchars($k['waktu_masuk']) ?></td>
          <td><?= htmlspecialchars($k['status']) ?></td>
          <td>
            <?php if ($k['status'] == 'MASUK'): ?>
              <a class="keluar-link" href="/keluar/<?= $k['id'] ?>">Keluar</a>
            <?php else: ?>
              <?= htmlspecialchars($k['waktu_keluar']) ?>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="search-form">
      <form action="/cari" method="get">
        <input type="text" name="keyword" placeholder="🔍 Cari No Polisi..." required />
        <button type="submit">Cari</button>
      </form>
    </div>
  </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  <?php if (session()->getFlashdata('pesan')): ?>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '<?= session()->getFlashdata('pesan') ?>',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true
    });
  <?php elseif (session()->getFlashdata('error')): ?>
    Swal.fire({
      icon: 'error',
      title: 'Gagal!',
      text: '<?= session()->getFlashdata('error') ?>',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true
    });
  <?php endif; ?>
</script>

</body>
</html>
