<?php

namespace App\Controllers;

use App\Models\EvaluationTrainingModel;
use App\Models\PersonnelModel;
use App\Models\ResponseModel;
use App\Models\TrainingModel;
use App\Models\UserModel;

class Finished extends BaseController
{
    public function getIndex()
    {
        $session = session();
        $trainingModel = new TrainingModel();
        $userModel = new UserModel();
        $trainings = [];
        $user = $userModel->find($session->get("id"));

        if ($session->get("isAdmin")) {
            $trainings = $trainingModel->where("status", "done")->findAll();
        } else {
            $all = $trainingModel->where("status", "done")->findAll();
            foreach ($all as $training) {
                if (in_array($user->personnel->id, $training->participants_ids)) {
                    array_push($trainings, $training);
                }
            }
        }
        return view("admin/finished/index", [
            "trainings" => $trainings,

        ]);
    }

    public function getShow($id)
    {
        $session = session();
        $personnelModel = new PersonnelModel();
        $responseModel = new ResponseModel();
        $userModel = new UserModel();
        $trainingModel = new TrainingModel();
        $training =  $trainingModel->find($id);
        $user = $userModel->find($session->get("id"));
        $userHasEval = false;
        $userHasAssess = false;
        $userResponses = $responseModel->where("personnel_id", $user->personnel->id)->findAll();
        $evalId = 0;

        foreach ($userResponses as $response) {



            $evaluation = $training->evaluation ? 1 : 0;
            $assessment = $training->assessment ? 1 : 0;

            if ($evaluation == 1) {
                $evaluation = $training->evaluation->id;
            }

            if ($assessment == 1) {
                $assessment = $training->assessment->id;
            }

            if ($response->questionnaire_id == $evaluation) {
                $userHasEval = true;
            }

            if ($response->questionnaire_id == $assessment) {
                $userHasAssess = true;
            }
        }


        $obj = new EvaluationTrainingModel();
        $evaluations = $obj->where("training_id", $id)->where("personnel_id", $user->personnel->id)->findAll();
        // var_dump();
        if ($evaluations) {
            $userHasEval = true;
            $evalId = $evaluations[0]["id"];
        } else {
            $userHasEval = false;
        }


        return view("admin/finished/show", [
            "personnels" => $personnelModel->findAll(),
            "training" => $training,
            "userHasEval" => $userHasEval,
            "userHasAssess" => $userHasAssess,
            "evalId" => $evalId
        ]);
    }
}
