<?php

namespace App\Entities;

use App\Models\QuestionModel;
use App\Models\ResponseModel;
use App\Models\TrainingModel;
use CodeIgniter\Entity\Entity;

class Questionnaire extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getTraining()
    {
        $trainingModel = new TrainingModel();
        return $trainingModel->find($this->attributes["training_id"]);
    }

    public function getQuestions()
    {
        $questionModel = new QuestionModel();
        return $questionModel->where("questionnaire_id", $this->attributes["id"])->findAll();
    }


    public function getResponses()
    {
        $responseModel = new ResponseModel();
        return $responseModel->where("questionnaire_id", $this->attributes["id"])->findAll();
    }
}
