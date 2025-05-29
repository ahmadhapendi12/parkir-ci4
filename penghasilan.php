<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Penghasilan Parkir</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f3f4f6;
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 230px;
      background-color: #1e40af;
      color: white;
      display: flex;
      flex-direction: column;
      padding: 20px;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      font-size: 1.5rem;
      font-weight: 600;
      text-align: left;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 10px;
      display: block;
      font-weight: bold;
      transition: background 0.2s ease;
    }

    .sidebar a:hover {
      background-color: #3749c1;
    }

    .sidebar .logout-sidebar {
      margin-top: auto;
      background-color: #ef4444;
      text-align: center;
    }

    .sidebar .logout-sidebar:hover {
      background-color: #dc2626;
    }

    .content {
      flex-grow: 1;
      padding: 30px;
    }

    h1 {
      font-size: 1.8rem;
      color: #1e3a8a;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 8px;
      background: transparent;
      margin-bottom: 30px;
    }

    thead th {
      background-color: #2563eb;
      color: white;
      padding: 14px;
      text-align: center;
      border-radius: 8px 8px 0 0;
      border: none;
    }

    tbody tr {
      background: linear-gradient(90deg, #e0f2fe 0%, #bae6fd 100%);
      transition: background-color 0.3s ease;
      border-radius: 8px;
    }

    tbody tr:hover {
      background-color: #60a5fa;
      color: white;
      cursor: pointer;
    }

    tbody td {
      padding: 12px;
      text-align: center;
      border: none;
    }

    tfoot tr.total-row td {
      background: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%);
      color: white;
      font-weight: 700;
      border-radius: 0 0 8px 8px;
      padding: 15px;
    }

    form {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      align-items: center;
      margin-bottom: 30px;
    }

    label {
      font-weight: 600;
      color: #1e3a8a;
    }

    input[type="date"] {
      padding: 8px 12px;
      border: 1px solid #cbd5e1;
      border-radius: 6px;
      font-size: 1rem;
    }

    button {
      background: linear-gradient(90deg, #2563eb 0%, #3b82f6 100%);
      color: white;
      border: none;
      border-radius: 8px;
      padding: 12px 25px;
      font-weight: 700;
      cursor: pointer;
      box-shadow: 0 4px 8px rgb(37 99 235 / 0.4);
      transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    button:hover {
      background: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%);
      box-shadow: 0 6px 12px rgb(59 130 246 / 0.6);
    }

    .chart-container {
      background: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    canvas {
      max-height: 350px;
      width: 100% !important;
    }

    .total-chart {
      margin-top: 15px;
      font-weight: 700;
      font-size: 1.1rem;
      color: #1e3a8a;
      text-align: center;
      background-color: #dbeafe;
      border-radius: 8px;
      padding: 10px 0;
    }

    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }

      .sidebar {
        width: 100%;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
      }

      .sidebar a, .sidebar h2 {
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Penghasilan Parkir</h2>
    <a href="/">Beranda</a>
    <a href="/parkir">Input Kendaraan</a>
    <a href="/penghasilan">Laporan</a>
     <a href="/beranda">Logout</a>
  </div>

  <!-- Content Area -->
  <div class="content">
    <h1>Rekap Penghasilan</h1>

    <form action="/penghasilan/filter" method="post">
      <label for="start_date">Dari Tanggal:</label>
      <input type="date" id="start_date" name="start_date" required>
      <label for="end_date">Sampai Tanggal:</label>
      <input type="date" id="end_date" name="end_date" required>
      <button type="submit">Filter</button>
    </form>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>No Polisi</th>
          <th>Jenis Kendaraan</th>
          <th>Durasi (jam)</th>
          <th>Total Bayar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($penghasilan as $i => $p): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= htmlspecialchars($p['no_polisi']) ?></td>
          <td><?= htmlspecialchars($p['jenis_kendaraan']) ?></td>
          <td><?= htmlspecialchars($p['durasi']) ?></td>
          <td>Rp <?= number_format($p['total_bayar'], 0, ',', '.') ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <?php $total = array_sum(array_column($penghasilan, 'total_bayar')); ?>
        <tr class="total-row">
          <td colspan="4">Total</td>
          <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
        </tr>
      </tfoot>
    </table>

    <div class="chart-container">
      <h2 style="text-align:center; margin-bottom: 15px;">Grafik Penghasilan</h2>
      <canvas id="grafikPenghasilan"></canvas>
      <div id="totalBayarChart" class="total-chart"></div>
    </div>
  </div>

  <!-- Chart Script -->
  <script>
    const labels = [
      <?php foreach ($penghasilan as $p) {
        echo "'" . addslashes($p['no_polisi']) . "',";
      } ?>
    ];

    const dataPoints = [
      <?php foreach ($penghasilan as $p) {
        echo $p['total_bayar'] . ',';
      } ?>
    ];

    const colors = ['#3b82f6', '#f97316', '#10b981', '#6366f1', '#facc15', '#ef4444', '#0ea5e9'];

    const ctx = document.getElementById('grafikPenghasilan').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Total Bayar (Rp)',
          data: dataPoints,
          backgroundColor: colors,
          borderRadius: 6,
          borderSkipped: false,
        }]
      },
      options: {
        plugins: {
          legend: { display: false },
          tooltip: {
            callbacks: {
              label: ctx => 'Rp ' + ctx.parsed.y.toLocaleString('id-ID')
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: val => 'Rp ' + val.toLocaleString('id-ID')
            }
          }
        }
      }
    });

    const totalBayar = dataPoints.reduce((a, b) => a + b, 0);
    document.getElementById('totalBayarChart').textContent =
      'Total Pendapatan: Rp ' + totalBayar.toLocaleString('id-ID');
  </script>

</body>
</html>
