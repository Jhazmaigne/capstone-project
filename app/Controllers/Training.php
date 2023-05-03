<?php

namespace App\Controllers;

use App\Models\PersonnelModel;
use App\Models\TopicModel;
use App\Models\TrainingModel;
use App\Models\UserModel;

class Training extends BaseController
{
    public function getIndex()
    {

        $trainingModel = new TrainingModel();
        return view("admin/training/index", [
            "trainings" => $trainingModel->findAll(),
            "draft" => $trainingModel->where("status", "draft")->findAll(),
            "done" => $trainingModel->where("status", "done")->findAll(),
            "cancel" => $trainingModel->where("status", "cancel")->findAll(),
            "ongoing" => $trainingModel->where("status", "ongoing")->findAll()
        ]);
    }

    public function getCreate()
    {
        $personnelModel = new PersonnelModel();
        return view("admin/training/create", ["personnels" => $personnelModel->findAll()]);
    }

    public function getEdit($id)
    {
        $personnelModel = new PersonnelModel();
        $trainingModel = new TrainingModel();
        return view("admin/training/edit", ["personnels" => $personnelModel->findAll(), "training" => $trainingModel->find($id)]);
    }

    public function getShow($id)
    {
        $personnelModel = new PersonnelModel();
        $trainingModel = new TrainingModel();
        return view("admin/training/show", ["personnels" => $personnelModel->findAll(), "training" => $trainingModel->find($id)]);
    }

    public function postInsert()
    {
        $topicModel = new TopicModel();
        $topic = $topicModel->insert([
            "title" => $this->request->getVar("topic"),
            "datetime" => $this->request->getVar("datetime"),
            "speaker_id" => $this->request->getVar("speaker_id"),
            "training_id" => $this->request->getVar("training_id"),
        ]);
        return redirect()->to("training/show/" . $this->request->getVar("training_id"));
    }

    public function postEnroll()
    {
        $session = session();
        $userModel = new UserModel();
        $trainings = [];
        $user = $userModel->find($session->get("id"));
        $db = db_connect();
        $builder = $db->table('trainings');
        $query = $builder->getWhere(["code" => $this->request->getVar("code"), "status" => "ongoing"]);
        $trainingModel = new TrainingModel();
        $training = null;
        if ($query->getResult()) {
            $training = $trainingModel->find($query->getRow()->id);
            $builder2 = $db->table("personnel_trainings");

            if (in_array($user->personnel->id, $training->participants_ids)) {
                return redirect()->back()->with('foo', 'unable');
            }

            $builder2->insert([
                "training_id" => $query->getRow()->id,
                "personnel_id" => $user->personnel->id
            ]);
        }

        if ($training)
            return redirect()->back()->with('foo', 'success');
        else
            return redirect()->back()->with('foo', 'failed');
    }

    public function postStore()
    {
        helper('text');
        $participants = $this->request->getVar("participants");
        $trainingModel = new TrainingModel();
        $db = db_connect();

        $code = null;

        while (!$code) {
            $randomCode = random_string('alnum', 16);
            $builder = $db->table('trainings');
            $query = $builder->getWhere(["code" => $randomCode]);

            if (!$query->getResult()) {
                $code = $randomCode;
            }
        }

        $training = $trainingModel->insert([
            "topic" => $this->request->getVar("topic"),
            "venue" => $this->request->getVar("venue"),
            "place" => $this->request->getVar("place"),
            "datetime" => $this->request->getVar("datetime"),
            "speaker_id" => $this->request->getVar("speaker_id"),
            "facilitator_id" => $this->request->getVar("facilitator_id"),
            "status" => $this->request->getVar("status"),
            "code" => $code
        ]);


        $builder = $db->table("personnel_trainings");

        if ($participants) {
            foreach ($participants as $participant) {
                $builder->insert([
                    "training_id" => $training,
                    "personnel_id" => $participant
                ]);
            }
        }
        return redirect()->to("training/show/" . $training);
    }

    public function postUpdate()
    {
        $participants = $this->request->getVar("participants");
        $trainingModel = new TrainingModel();
        $training = $trainingModel->update($this->request->getVar("id"), [
            "topic" => $this->request->getVar("topic"),
            "venue" => $this->request->getVar("venue"),
            "place" => $this->request->getVar("place"),
            "datetime" => $this->request->getVar("datetime"),
            "speaker_id" => $this->request->getVar("speaker_id"),
            "facilitator_id" => $this->request->getVar("facilitator_id"),
            "status" => $this->request->getVar("status")
        ]);
        $db = db_connect();
        $builder = $db->table("personnel_trainings");
        $builder->where("training_id", $this->request->getVar("id"))->delete();

        if ($participants) {
            foreach ($participants as $participant) {
                $builder->insert([
                    "training_id" => $this->request->getVar("id"),
                    "personnel_id" => $participant
                ]);
            }
        }

        return redirect()->to("training/show/" . $this->request->getVar("id"));
    }

    public function postDelete()
    {
        $trainingModel = new TrainingModel();
        $trainingModel->delete($this->request->getVar("id"));
        return redirect()->to("training");
    }
}
