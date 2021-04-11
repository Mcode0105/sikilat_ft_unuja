<?php

namespace App\Models;

use CodeIgniter\Model;



class MOdelRegistrasi extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'username', 'password', 'id_instansi', 'jenis_kebutuhan', 'jenis_kelamin', 'foto', 'level'];
    protected $useTimestamps = true;

    public function getregister($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
