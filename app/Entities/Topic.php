<?php

namespace App\Entities;

use App\Models\PersonnelModel;
use CodeIgniter\Entity\Entity;

class Topic extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getSpeaker()
    {
        $personnelModel = new PersonnelModel();
        return $personnelModel->find($this->attributes["speaker_id"]);
    }
}
