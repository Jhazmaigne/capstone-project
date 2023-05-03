<?php

namespace App\Entities;

use App\Models\PositionModel;
use App\Models\UserModel;
use CodeIgniter\Entity\Entity;

class Personnel extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];


    public function getFullName()
    {
        return $this->attributes["first_name"] . " " . $this->attributes["last_name"];
    }

    public function getPosition()
    {
        $positionModel = new PositionModel();
        return $positionModel->find($this->attributes["position_id"]);
    }

    public function getUser()
    {
        $userModel = new UserModel();
        return $userModel->find($this->attributes["user_id"]);
    }
}
