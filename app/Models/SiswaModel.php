<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nilai_sikap', 'nilai_akademis', 'absensi', 'nilai_non_akademik','kelas'];
    protected $useTimestamps = false;
}