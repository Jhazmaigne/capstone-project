<?php

namespace App\Controllers;

use App\Models\PersonnelModel;
use App\Models\PositionModel;
use App\Models\UserModel;

class Personnel extends BaseController
{
    public function getIndex()
    {
        $personnelModel = new PersonnelModel();
        return view("admin/personnel/index",  ["personnels" => $personnelModel->findAll()]);
    }

    public function getCreate()
    {
        $positionModel = new PositionModel();
        return view("admin/personnel/create", ["positions" => $positionModel->findAll()]);
    }

    public function getEdit($id)
    {
        $positionModel = new PositionModel();
        $personnelModel = new PersonnelModel();
        return view("admin/personnel/edit", ["positions" => $positionModel->findAll(), "personnel" => $personnelModel->find($id)]);
    }

    public function getShow($id)
    {
        $personnelModel = new PersonnelModel();
        return view("admin/personnel/show", ["personnel" => $personnelModel->find($id)]);
    }

    public function postStore()
    {
        $positionModel = new PositionModel();
        if (!$this->validate([
            "username" => "required|is_unique[users.username]"
        ])) {
            // var_dump($this->validator->getErrors());
            return view("admin/personnel/create", ["positions" => $positionModel->findAll(), "error" => $this->validator->getErrors()]);
        }

        $personnelModel = new PersonnelModel();
        $userModel = new UserModel();

        $user = $userModel->insert([
            "username" => $this->request->getVar("username"),
            "password" => password_hash($this->request->getVar("password"), PASSWORD_DEFAULT),
        ]);
        $personnel = $personnelModel->insert([
            "first_name" => $this->request->getVar("first_name"),
            "last_name" => $this->request->getVar("last_name"),
            "middle_name" => $this->request->getVar("middle_name") ? $this->request->getVar("middle_name") : null,
            "position_id" => $this->request->getVar("position_id"),
            "user_id" => $user
        ]);
        return redirect()->to("personnel/show/" . $personnel);
    }

    public function postUpdate()
    {
        $positionModel = new PositionModel();
        $personnelModel = new PersonnelModel();
        $personnel = $personnelModel->find($this->request->getVar("id"));

        if ($this->request->getVar("password") != "123456789abcdefghijk") {
            $userModel = new UserModel();
            $userModel->update($personnel->user_id, ["password" => password_hash($this->request->getVar("password"), PASSWORD_DEFAULT)]);
        }

        $personnelModel->update($this->request->getVar("id"), [
            "first_name" => $this->request->getVar("first_name"),
            "last_name" => $this->request->getVar("last_name"),
            "middle_name" => $this->request->getVar("middle_name") ? $this->request->getVar("middle_name") : null,
            "position_id" => $this->request->getVar("position_id"),
        ]);

        return redirect()->to("personnel/show/" . $this->request->getVar("id"));
    }

    public function postDelete()
    {
        $id = $this->request->getVar("id");
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to("personnel");
    }
}
