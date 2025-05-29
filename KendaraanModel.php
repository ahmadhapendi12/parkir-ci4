<?php namespace App\Models;

use CodeIgniter\Model;

class KendaraanModel extends Model
{
    protected $table = 'kendaraan';
    protected $allowedFields = ['no_polisi', 'jenis_kendaraan', 'harga_perjam', 'waktu_masuk', 'waktu_keluar', 'status'];
}
