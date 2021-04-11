<?php

namespace App\Models;

use CodeIgniter\Model;



class ModelToken extends Model
{
    protected $table = 'user_token';
    protected $primaryKey = 'id_token';
    protected $allowedFields = ['email', 'token'];
    protected $useTimestamps = true;

    public function gettoken()
    {
        return $this->findAll();
    }
}
