<?php

namespace App\Entities;

use App\Models\AnswerModel;
use App\Models\PersonnelModel;
use App\Models\QuestionnaireModel;
use CodeIgniter\Entity\Entity;

class Response extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getAnswers()
    {
        $answerModel = new AnswerModel();
        return $answerModel->where("response_id", $this->attributes["id"])->findAll();
    }

    public function getQuestionnaire()
    {
        $questionnaireModel = new QuestionnaireModel();
        return $questionnaireModel->find($this->attributes["questionnaire_id"]);
    }

    public function getPersonnel()
    {
        $userModel = new PersonnelModel();
        return $userModel->find($this->attributes["personnel_id"]);
    }

    public function getCorrectAnswers()
    {
        $allAnswers = $this->getAnswers();
        $correct = [];
        foreach ($allAnswers as $answer) {
            if ($answer->choice->is_correct) {
                array_push($correct, $answer);
            }
        }
        return $correct;
    }
    public function getIncorrectAnswers()
    {
        $allAnswers = $this->getAnswers();
        $incorrect = [];
        foreach ($allAnswers as $answer) {
            if (!$answer->choice->is_correct) {
                array_push($incorrect, $answer);
            }
        }
        return $incorrect;
    }
}
