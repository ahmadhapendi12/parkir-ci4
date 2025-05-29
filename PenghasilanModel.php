<?php namespace App\Models;

use CodeIgniter\Model;

class PenghasilanModel extends Model
{
    protected $table = 'penghasilan';
    protected $allowedFields = ['kendaraan_id', 'durasi', 'total_bayar'];

    public function getAllWithKendaraan()
    {
        return $this->select('penghasilan.*, kendaraan.no_polisi, kendaraan.jenis_kendaraan')
                    ->join('kendaraan', 'kendaraan.id = penghasilan.kendaraan_id')
                    ->findAll();
    }
    public function getFiltered($start, $end)
    {
        return $this->select('penghasilan.*, kendaraan.no_polisi, kendaraan.jenis_kendaraan')
            ->join('kendaraan', 'kendaraan.id = penghasilan.kendaraan_id')
            ->where('kendaraan.waktu_keluar >=', $start)
            ->where('kendaraan.waktu_keluar <=', $end . ' 23:59:59')
            ->findAll();
    }
    
}
