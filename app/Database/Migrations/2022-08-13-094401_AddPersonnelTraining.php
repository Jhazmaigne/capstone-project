<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPersonnelTraining extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
                "auto_increment" => true,
            ],
            "personnel_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "training_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("personnel_id", "personnels", "id", "CASCADE", "CASCADE");
        $this->forge->addForeignKey("training_id", "trainings", "id", "CASCADE", "CASCADE");
        $this->forge->createTable("personnel_trainings");
    }

    public function down()
    {
        $this->forge->dropTable("personnel_trainings");
    }
}
