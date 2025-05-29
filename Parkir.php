<?php namespace App\Controllers;

use App\Models\KendaraanModel;
use App\Models\PenghasilanModel;

class Parkir extends BaseController
{
    public function index()
    {
        $model = new KendaraanModel();
        $data['kendaraan'] = $model->findAll();
        return view('dashboard', $data);
    }

   public function simpan()
{
    $jenis = $this->request->getPost('jenis_kendaraan');
    $harga = 0;

    switch ($jenis) {
        case 'Motor': $harga = 3000; break;
        case 'Mini Bus': $harga = 5000; break;
        case 'Truck': $harga = 7000; break;
        case 'Bus': $harga = 10000; break;
    }

    $model = new KendaraanModel();
    $simpan = $model->save([
        'no_polisi' => $this->request->getPost('no_polisi'),
        'jenis_kendaraan' => $jenis,
        'harga_perjam' => $harga,
        'waktu_masuk' => date('Y-m-d H:i:s'),
        'status' => 'MASUK'
    ]);

    if ($simpan) {
        session()->setFlashdata('pesan', 'Data kendaraan berhasil disimpan!');
    } else {
        session()->setFlashdata('error', 'Gagal menyimpan data kendaraan.');
    }

    // Redirect ke halaman input yang sama (misal /parkir)
    return redirect()->to('/parkir');
}

public function keluar($id)
{
    $model = new KendaraanModel();
    $kendaraan = $model->find($id);
    $waktu_keluar = date('Y-m-d H:i:s');

    $jam = ceil((strtotime($waktu_keluar) - strtotime($kendaraan['waktu_masuk'])) / 3600);
    $biaya = $kendaraan['harga_perjam'] + (($jam - 1) * 2000);

    $update = $model->update($id, [
        'waktu_keluar' => $waktu_keluar,
        'status' => 'KELUAR'
    ]);

    $penghasilan = new PenghasilanModel();
    $penghasilan->save([
        'kendaraan_id' => $id,
        'durasi' => $jam,
        'total_bayar' => $biaya
    ]);

    if ($update) {
        session()->setFlashdata('pesan', 'Kendaraan berhasil keluar dan penghasilan dicatat.');
    } else {
        session()->setFlashdata('error', 'Gagal memproses kendaraan keluar.');
    }

    // Redirect ke halaman input yang sama (misal /parkir)
    return redirect()->to('/parkir');
}

    public function penghasilan()
    {
        $model = new PenghasilanModel();
        $data['penghasilan'] = $model->getAllWithKendaraan();
        return view('penghasilan', $data);
    }

    public function filterPenghasilan()
    {
        $start = $this->request->getPost('start_date');
        $end = $this->request->getPost('end_date');

        $model = new PenghasilanModel();
        $data['penghasilan'] = $model->getFiltered($start, $end);
        return view('penghasilan', $data);
    }

    public function cari()
    {
        $keyword = $this->request->getGet('keyword');
        $model = new KendaraanModel();
        $data['kendaraan'] = $model->like('no_polisi', $keyword)->findAll();
        return view('dashboard', $data);
    }
}
