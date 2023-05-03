<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddQuestionnaire extends Migration
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
            "title" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "is_evaluation" => [
                "type" => "INT",
                "constraint" => 1,
                "default" => 0,
            ],
            "training_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("training_id", "trainings", "id", "CASCADE", "CASCADE");
        $this->forge->createTable("questionnaires");
    }

    public function down()
    {
        $this->forge->dropTable("questionnaires");
    }
}
