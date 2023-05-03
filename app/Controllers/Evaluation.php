<?php

namespace App\Controllers;

use App\Models\QuestionnaireModel;
use App\Models\TrainingModel;

class Evaluation extends BaseController
{
    public function getIndex()
    {
        $session = session();
        $questionnaireModel = new QuestionnaireModel();
        $trainingModel = new TrainingModel();
        return view("admin/evaluation/index", [
            "evaluations" => $questionnaireModel->where("is_evaluation", true)->findAll(),
            "trainings" => $trainingModel->findAll(),
            "is_admin" => $session->get("isAdmin")
        ]);
    }

    public function getShow($id)
    {
        $questionnaireModel = new QuestionnaireModel();
        return view("admin/evaluation/show", ["evaluation" => $questionnaireModel->find($id)]);
    }

    public function postStore()
    {
        $questionnaireModel = new QuestionnaireModel();
        $evaluation = $questionnaireModel->insert([
            "title" => $this->request->getVar("title"),
            "training_id" => $this->request->getVar("training_id"),
            "is_evaluation" => true
        ]);
        return redirect()->to("evaluation/show/" . $evaluation);
    }

    public function postDelete()
    {
        $questionnaireModel = new QuestionnaireModel();
        $questionnaireModel->delete($this->request->getVar("id"));
        return redirect()->to("evaluation");
    }
}
