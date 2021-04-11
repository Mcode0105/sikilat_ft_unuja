<?php

namespace App\Models;

use CodeIgniter\Model;


class ModelKode extends Model
{
    protected $table = 'kode_lab';
    protected $primaryKey = 'id_kode';
    protected $allowedFields = ['id', 'kode_lab'];
    protected $useTimestamps = true;

    public function getkode()
    {
        return $this->findAll();
    }
}
