<?php

namespace App\Controllers;

use App\Models\PositionModel;

class Position extends BaseController
{
    public function getIndex()
    {
        $positionModel = new PositionModel();
        return view("admin/position/index", ["positions" => $positionModel->findAll()]);
    }

    public function postStore()
    {
        $name = $this->request->getVar("name");
        $positionModel = new PositionModel();
        if ($name) {
            $positionModel->insert(["name" => $name]);
        }
        return redirect()->to("position");
    }

    public function postUpdate()
    {
        $id = $this->request->getVar("id");
        $name = $this->request->getVar("name");
        $positionModel = new PositionModel();
        if ($name) {
            $positionModel->update($id, ["name" => $name]);
        }
        return redirect()->to("position");
    }

    public function postDelete()
    {
        $id = $this->request->getVar("id");
        $positionModel = new PositionModel();
        $positionModel->delete($id);
        return redirect()->to("position");
    }
}
