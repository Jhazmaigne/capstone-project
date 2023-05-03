<?php

namespace App\Entities;

use App\Models\PersonnelModel;
use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getPersonnel()
    {
        $personnelModel = new PersonnelModel();
        return $personnelModel->where("user_id", $this->attributes["id"])->first();
    }
}
