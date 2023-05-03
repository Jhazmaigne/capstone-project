<?php

namespace App\Controllers;

use App\Models\PersonnelModel;
use App\Models\TrainingModel;
use App\Models\UserModel;

class Ongoing extends BaseController
{
    public function getIndex()
    {
        $session = session();
        $trainingModel = new TrainingModel();
        $userModel = new UserModel();
        $trainings = [];
        $user = $userModel->find($session->get("id"));

        if ($session->get("isAdmin")) {
            $trainings = $trainingModel->where("status", "ongoing")->findAll();
        } else {
            $all = $trainingModel->where("status", "ongoing")->findAll();
            foreach ($all as $training) {
                if (in_array($user->personnel->id, $training->participants_ids)) {
                    array_push($trainings, $training);
                }
            }
        }
        return view("admin/ongoing/index", [
            "trainings" => $trainings
        ]);
    }

    public function getShow($id)
    {
        $personnelModel = new PersonnelModel();
        $trainingModel = new TrainingModel();
        return view("admin/ongoing/show", ["personnels" => $personnelModel->findAll(), "training" => $trainingModel->find($id)]);
    }
}
