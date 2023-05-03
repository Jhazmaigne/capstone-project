<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $userModel->insert([
            "username" => "admin",
            "password" => password_hash("admin", PASSWORD_DEFAULT),
            "is_admin" => true
        ]);
    }
}
