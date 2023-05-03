<?php

namespace App\Controllers;

use App\Entities\Position;
use App\Entities\User;
use App\Models\PositionModel;
use App\Models\UserModel;
use App\Models\QuestionnaireModel;
use App\Models\TrainingModel;

class Assessment extends BaseController
{
    public function getIndex()
    {
        $session = session();
        $questionnaireModel = new QuestionnaireModel();
        $trainingModel = new TrainingModel();
        return view("admin/assessment/index", [
            "assessments" => $questionnaireModel->where("is_evaluation", false)->findAll(),
            "trainings" => $trainingModel->findAll(),
            "is_admin" => $session->get("isAdmin")
        ]);
    }

    public function getShow($id)
    {
        $questionnaireModel = new QuestionnaireModel();
        return view("admin/assessment/show", ["assessment" => $questionnaireModel->find($id)]);
    }

    public function postStore()
    {
        $questionnaireModel = new QuestionnaireModel();
        $assessment = $questionnaireModel->insert([
            "title" => $this->request->getVar("title"),
            "training_id" => $this->request->getVar("training_id"),
            "is_evaluation" => false
        ]);
        return redirect()->to("assessment/show/" . $assessment);
    }

    public function postDelete()
    {
        $questionnaireModel = new QuestionnaireModel();
        $questionnaireModel->delete($this->request->getVar("id"));
        return redirect()->to("assessment");
    }
}
