<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table = 'hasil'; // Sesuaikan dengan nama tabel di database Anda
    protected $primaryKey = 'id'; // Sesuaikan dengan nama primary key yang digunakan
    protected $allowedFields = ['nama', 'nilai_total']; // Sesuaikan dengan kolom yang dapat diisi

    // Tambahan kode atau metode lainnya yang Anda butuhkan untuk model ini
}
