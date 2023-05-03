<?php

namespace App\Controllers;

use App\Models\ChoiceModel;
use App\Models\QuestionModel;

class Question extends BaseController
{
    public function postStore()
    {
        $questionModel = new QuestionModel();
        $choiceModel = new ChoiceModel();
        $question = $questionModel->insert([
            "description" => $this->request->getVar("description"),
            "questionnaire_id" => $this->request->getVar("id"),
        ]);

        $choiceModel->insert([
            "description" => $this->request->getVar("description_1"),
            "question_id" => $question,
            "is_correct" => $this->request->getVar("correct_answer") == "1" ? true : false
        ]);

        $choiceModel->insert([
            "description" => $this->request->getVar("description_2"),
            "question_id" => $question,
            "is_correct" => $this->request->getVar("correct_answer") == "2" ? true : false
        ]);

        $choiceModel->insert([
            "description" => $this->request->getVar("description_3"),
            "question_id" => $question,
            "is_correct" => $this->request->getVar("correct_answer") == "3" ? true : false
        ]);

        $choiceModel->insert([
            "description" => $this->request->getVar("description_4"),
            "question_id" => $question,
            "is_correct" => $this->request->getVar("correct_answer") == "4" ? true : false
        ]);

        if ($this->request->getVar("is_assessment"))
            return redirect()->to("assessment/show/" . $this->request->getVar("id"));
        return redirect()->to("evaluation/show/" . $this->request->getVar("id"));
    }

    public function postDelete()
    {
        $questionModel = new QuestionModel();
        $questionModel->delete($this->request->getVar("id"));
        if ($this->request->getVar("is_assessment"))
            return redirect()->to("assessment/show/" . $this->request->getVar("questionnaire_id"));
        return redirect()->to("evaluation/show/" . $this->request->getVar("questionnaire_id"));
    }
}
