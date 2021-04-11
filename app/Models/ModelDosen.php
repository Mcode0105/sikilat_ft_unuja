<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelDosen extends Model
{
    protected $table = 'tb_dosen';
    protected $primaryKey = 'id_dosen';
    protected $allowedFields = ['nidn', 'email', 'nama'];
    protected $useTimestamps = true;

    public function getdosen($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_dosen' => $id])->first();
    }
}
