<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelProfil extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'username', 'password', 'id_instansi', 'jenis_kebutuhan', 'jenis_kelamin', 'foto', 'level', 'active'];
    protected $useTimestamps = true;

    public function getprofil($username)
    {
        return $this->where(['username' => $username])->first();
    }

    public function getadmin($username)
    {
        return $this->where(['level' => $username])->first();
    }
}
