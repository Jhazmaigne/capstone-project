<?php

namespace App\Controllers;

use App\Models\AnswerModel;
use App\Models\QuestionnaireModel;
use App\Models\ResponseModel;
use App\Models\TrainingModel;
use App\Models\UserModel;

class Response extends BaseController
{
    public function getShow($id, $is_eval = 1)
    {
        $trainingModel = new TrainingModel();
        $training = $trainingModel->find($id);
        $questionnaire = $is_eval ? $training->evaluation : $training->assessment;
        return view("admin/response/show", ["questionnaire" => $questionnaire]);
    }

    public function getShowra($id)
    {
        $responseModel = new ResponseModel();
        $response = $responseModel->find($id);
        return view("admin/response/showr", ["response" => $response]);
    }

    public function getShowcert($id)
    {
        ini_set('display_errors', 1);
        $responseModel = new ResponseModel();
        $response = $responseModel->find($id);
        return view("admin/response/showcert", ["response" => $response]);
    }

    public function getShowr($id, $is_eval = 1)
    {
        ini_set('display_errors', 1);
        $trainingModel = new TrainingModel();
        $session = session();
        $userModel = new UserModel();
        $user = $userModel->find($session->get("id"));
        $training = $trainingModel->find($id);
        $response = null;
        $responses = $is_eval ? $training->evaluation->responses : $training->assessment->responses;
        foreach ($responses as $resp) {
            if ($resp->personnel_id == $user->personnel->id) {
                $response = $resp;
            }
        }
        return view("admin/response/showr", ["response" => $response]);
    }

    public function postSubmit()
    {
        ini_set('display_errors', 1);
        $responseModel = new ResponseModel();
        $userModel = new UserModel();
        $answerModel = new AnswerModel();
        $questionnaireModel = new QuestionnaireModel();
        $session = session();
        $user = $userModel->find($session->get("id"));
        $personnel_id = $user->personnel->id;
        $questionnaire = $questionnaireModel->find($this->request->getVar("id"));

        $response = $responseModel->insert([
            "questionnaire_id" => $this->request->getVar("id"),
            "personnel_id" => $personnel_id,
        ]);

        $all = $this->request->getVar();
        foreach ($all as $key => $value) {
            if ($key == "id")
                continue;
            $question_id = explode("choice_id_", $key)[1];
            $choice_id = $value;
            $answerModel->insert([
                "response_id" => $response,
                "question_id" => $question_id,
                "choice_id" => $choice_id,
            ]);
        }
        $responseNewInstance = $responseModel->find($response);
        $session->setFlashdata("success", "Submitted Successfully!");
        return view("admin/response/showr", ["response" => $responseNewInstance]);
    }
}
