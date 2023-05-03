<?php

namespace App\Controllers;

use App\Models\PersonnelModel;
use App\Models\TrainingModel;

class Draft extends BaseController
{
    public function getIndex()
    {
        $trainingModel = new TrainingModel();
        return view("admin/draft/index", [
            "trainings" => $trainingModel->where("status", "draft")->findAll()
        ]);
    }

    public function getShow($id)
    {
        $personnelModel = new PersonnelModel();
        $trainingModel = new TrainingModel();
        return view("admin/draft/show", ["personnels" => $personnelModel->findAll(), "training" => $trainingModel->find($id)]);
    }
}
