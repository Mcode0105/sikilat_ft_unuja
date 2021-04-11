<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelKategori extends Model
{
    protected $table = 'tb_kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['kategori'];
    protected $useTimestamps = true;

    public function getkategori($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kategori' => $id])->first();
    }
}
