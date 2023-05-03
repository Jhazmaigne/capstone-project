<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function getIndex()
    {
        return view("auth");
    }
    public function postAuthenticate()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getVar("username");
        $password = $this->request->getVar("password");
        $data = $model->where("username", $username)->first();
        if ($data) {
            $user_password = $data->password;
            $password_is_valid = password_verify($password, $user_password);

            if ($password_is_valid) {
                $ses_data = [
                    "id" => $data->id,
                    "username" => $data->username,
                    "isSignedIn" => TRUE,
                    "isAdmin" => $data->is_admin,
                    "fullname" => $data->personnel ? $data->personnel->fullname : "",
                    "position" => $data->personnel ? $data->personnel->position->name : "",
                ];
                $session->set($ses_data);
                if ($data->is_admin) {
                    return redirect()->to("/position");
                } else {
                    return redirect()->to("/ongoing");
                }
            }
        }
        $session->setFlashdata("failed", "Login Failed");
        return redirect()->to("/login");
    }

    public function postDestroy()
    {
        $session = session();
        $session->destroy();
        return redirect()->to("/login");
    }
}
