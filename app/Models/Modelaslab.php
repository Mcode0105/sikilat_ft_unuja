<?php

namespace App\Models;

use CodeIgniter\Model;


class Modelaslab extends Model
{
    protected $table = 'tb_aslab';
    protected $primaryKey = 'id_aslab';
    protected $allowedFields = ['nama', 'jurusan', 'nohp', 'foto'];
    protected $useTimestamps = true;

    public function getaslab()
    {
        return $this->findAll();
    }
}
