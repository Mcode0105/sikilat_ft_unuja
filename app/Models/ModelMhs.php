<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMhs extends Model
{
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'id_mhs';
    protected $allowedFields = ['nama_mhs', 'nim_mhs'];
    protected $useTimestamps = true;

    public function getmhs($nim)
    {
        return $this->db->table('tb_mahasiswa')
            ->where('nim_mhs', $nim)
            ->get()->getResultArray();
    }
}
