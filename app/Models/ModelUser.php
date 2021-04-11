<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'username', 'password', 'id_instansi',  'jenis_kelamin', 'foto', 'level', 'active'];
    protected $useTimestamps = true;
    public function getregister($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function jumlahuser()
    {
        $db = \Config\Database::connect();
        $query = $db->table('tb_user')->countAll();
        return $query;
    }
    public function user($user)
    {
        $this->db->table('user')->where($user);
    }
    public function getuser($id_user)
    {
        return $this->db->table('tb_user')
            ->where('id_user', $id_user)
            ->join('tb_instansi', 'tb_instansi.id_instansi=tb_user.id_instansi')
            ->get()->getResultArray();
    }
    public function profiluser()
    {
        return $this->db->table('tb_user')
            ->join('tb_instansi', 'tb_instansi.id_instansi=tb_user.id_instansi')
            ->get()->getResultArray();
    }
}
