<?php

namespace App\Entities;

use App\Models\ChoiceModel;
use App\Models\TrainingModel;
use CodeIgniter\Entity\Entity;

class Question extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getTraining()
    {
        $trainingModel = new TrainingModel();
        return $trainingModel->find($this->attributes["training_id"]);
    }

    public function getChoices()
    {
        $choiceModel = new ChoiceModel();
        return $choiceModel->where("question_id", $this->attributes["id"])->findAll();
    }

    public function getCorrectAnswer()
    {
        $choiceModel = new ChoiceModel();
        return $choiceModel->where("question_id", $this->attributes["id"])->where("is_correct", 1)->first();
    }
}
