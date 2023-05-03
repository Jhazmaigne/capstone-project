<?php

namespace App\Entities;

use App\Models\ChoiceModel;
use App\Models\QuestionModel;
use CodeIgniter\Entity\Entity;

class Answer extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getQuestion()
    {
        $questionModel = new QuestionModel();
        return $questionModel->find($this->attributes["question_id"]);
    }


    public function getChoice()
    {
        $choiceModel = new ChoiceModel();
        return $choiceModel->find($this->attributes["choice_id"]);
    }
}
