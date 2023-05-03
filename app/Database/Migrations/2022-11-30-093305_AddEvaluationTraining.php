<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEvaluationTraining extends Migration
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
            "training_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "personnel_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "name" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "gender" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "position" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "school" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "district" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "first" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "second" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "third" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "fourth" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "fifth" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("personnel_id", "personnels", "id", "NULL", "NULL");
        $this->forge->addForeignKey("training_id", "trainings", "id", "NULL", "NULL");
        $this->forge->createTable("evaluationtrainings");
    }

    public function down()
    {
        $this->forge->dropTable("evaluationtrainings");
    }
}
