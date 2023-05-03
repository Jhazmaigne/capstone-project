<?php

namespace App\Entities;

use App\Models\PersonnelModel;
use App\Models\QuestionnaireModel;
use App\Models\TopicModel;
use App\Models\TrainingModel;
use CodeIgniter\Entity\Entity;

class Training extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getSpeaker()
    {
        $personnelModel = new PersonnelModel();
        return $personnelModel->find($this->attributes["speaker_id"]);
    }

    public function getFacilitator()
    {
        $personnelModel = new PersonnelModel();
        return $personnelModel->find($this->attributes["facilitator_id"]);
    }

    public function getTopics()
    {
        $topicModel = new TopicModel();
        return $topicModel->where("training_id", $this->attributes["id"])->findAll();
    }

    public function getParticipants()
    {
        $db = db_connect();
        $query = $db->query("SELECT * FROM personnel_trainings WHERE training_id = {$this->attributes["id"]}");
        $personnels = $query->getResultArray();
        $personnelModel = new PersonnelModel();
        $participants = [];
        foreach ($personnels as $personnel) {
            array_push($participants, $personnelModel->find($personnel["personnel_id"]));
        }
        return $participants;
    }

    public function getParticipantsIds()
    {
        $db = db_connect();
        $query = $db->query("SELECT personnel_id FROM personnel_trainings WHERE training_id = {$this->attributes["id"]}");
        $personnels = $query->getResultArray();
        $participants = [];
        foreach ($personnels as $personnel) {
            array_push($participants, intval($personnel["personnel_id"]));
        }
        return $participants;
    }

    public function getEvaluation()
    {
        $questionnaireModel = new QuestionnaireModel();
        return $questionnaireModel->where("training_id", $this->attributes["id"])->where("is_evaluation", true)->first();
    }

    public function getAssessment()
    {
        $questionnaireModel = new QuestionnaireModel();
        return $questionnaireModel->where("training_id", $this->attributes["id"])->where("is_evaluation", false)->first();
    }


    public function getHasEvaluation()
    {
        $questionnaireModel = new QuestionnaireModel();
        return $questionnaireModel->where("training_id", $this->attributes["id"])->where("is_evaluation", true)->countAllResults() > 0;
    }

    public function getHasAssessment()
    {
        $questionnaireModel = new QuestionnaireModel();
        return $questionnaireModel->where("training_id", $this->attributes["id"])->where("is_evaluation", false)->countAllResults() > 0;
    }
}
