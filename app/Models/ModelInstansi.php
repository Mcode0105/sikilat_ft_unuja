<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelInstansi extends Model
{
    protected $table = 'tb_instansi';
    protected $primaryKey = 'id_instansi';
    protected $allowedFields = ['instansi'];
    protected $useTimestamps = true;

    public function getinstansi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_instansi' => $id])->first();
    }

    public function viewinstansi()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_instansi');
        return $builder->orderBy('instansi', 'DESC');
    }
}
