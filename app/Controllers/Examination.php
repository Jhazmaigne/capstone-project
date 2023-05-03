<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EvaluationTrainingModel;
use App\Models\TrainingModel;
use App\Models\UserModel;

class Examination extends BaseController
{
    public function getForm($id)
    {
        $trainingModel = new TrainingModel();
        $schools = [
            " Aglayan CS",
            "Airport Village ES",
            "Baganao ES",
            "Balangbang ES",
            "Barangay 9",
            "BCT ES",
            "Bendolan ES",
            "Bukidnon National HS",
            "Cabangahan ES",
            "Can-ayan IS",
            "Candiisan Is",
            "Capitan Angel IS",
            "Casisang Senior HS",
            "Casisang Central IS",
            "Casisang NHS",
            "Dalwangan ES",
            "Dalwangan NHS",
            "Damitan ES",
            "Kalasungay CS",
            "Imbayao ES",
            "Imbayao NHS",
            "Incalbog ES",
            "Kalasungay NHS",
            "Kibalabag IS",
            "Kilap-agan IS",
            "Sta. Ana ES",
            "Mabuhay IS",
            "Magsaysay IS",
        ];
        $districts = [
            "District 1",
            "District 2",
            "District 3",
            "District 4",
            "District 5",
            "CID"
        ];

        return view("admin/examination/index", [
            "training" => $trainingModel->find($id),
            "schools" => $schools,
            "districts" => $districts
        ]);
    }

    public function getShow($id)
    {
        $model = new EvaluationTrainingModel();
        // var_dump($model->find($id));
        $schools = [
            " Aglayan CS",
            "Airport Village ES",
            "Baganao ES",
            "Balangbang ES",
            "Barangay 9",
            "BCT ES",
            "Bendolan ES",
            "Bukidnon National HS",
            "Cabangahan ES",
            "Can-ayan IS",
            "Candiisan Is",
            "Capitan Angel IS",
            "Casisang Senior HS",
            "Casisang Central IS",
            "Casisang NHS",
            "Dalwangan ES",
            "Dalwangan NHS",
            "Damitan ES",
            "Kalasungay CS",
            "Imbayao ES",
            "Imbayao NHS",
            "Incalbog ES",
            "Kalasungay NHS",
            "Kibalabag IS",
            "Kilap-agan IS",
            "Sta. Ana ES",
            "Mabuhay IS",
            "Magsaysay IS",
        ];
        $districts = [
            "District 1",
            "District 2",
            "District 3",
            "District 4",
            "District 5",
            "CID"
        ];

        $ans = [
            "Strongly Disagree",
            "Disagree",
            "Agree",
            "Strongly Agree"
        ];
        return view("admin/examination/show", [
            "evaluation" => $model->find($id),
            "schools" => $schools,
            "districts" => $districts,
            "ans" => $ans
        ]);
    }

    public function postStore()
    {
        $session = session();
        $userModel = new UserModel();
        $user = $userModel->find($session->get("id"));

        $trainingModel = new TrainingModel();
        $training = $trainingModel->find($this->request->getVar("training_id"));
        $model = new EvaluationTrainingModel();

        $evaluation = $model->insert([
            "training_id" => $this->request->getVar("training_id"),
            "personnel_id" => $user->personnel->id,
            "name" => $this->request->getVar("name"),
            "school" => $this->request->getVar("school"),
            "gender" => $this->request->getVar("gender"),
            "position" => $this->request->getVar("position"),
            "district" => $this->request->getVar("district"),
            "first" => $this->request->getVar("first"),
            "second" => $this->request->getVar("second"),
            "third" => $this->request->getVar("third"),
            "fourth" => $this->request->getVar("fourth"),
            "fifth" => $this->request->getVar("fifth"),
        ]);

        return redirect()->to("examination/show/" . $evaluation);
    }
}
