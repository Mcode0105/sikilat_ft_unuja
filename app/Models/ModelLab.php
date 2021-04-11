<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelLab extends Model
{
    protected $table = 'tb_lab';
    protected $primaryKey = 'id_lab';
    protected $allowedFields = ['nama_lab', 'slug_lab', 'st', 'id_aslab', 'foto'];
    protected $useTimestamps = true;
    public function getlab($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_lab' => $id])->first();
    }

    public function labget()
    {
        return $this->where(['st' => '0'])
            ->get()->getResultArray();
    }

    public function viewlab()
    {
        return $this->db->table('tb_lab')
            ->join('tb_aslab', 'tb_aslab.id_aslab=tb_lab.id_aslab')
            ->get()->getResultArray();
    }
}
