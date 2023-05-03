<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTopic extends Migration
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
            "datetime" => [
                "type" => "DATETIME",
            ],
            "speaker_id" => [
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
        $this->forge->addForeignKey("speaker_id", "personnels", "id", "NULL", "NULL");
        $this->forge->addForeignKey("training_id", "trainings", "id", "NULL", "NULL");
        $this->forge->createTable("topics");
    }

    public function down()
    {
        $this->forge->dropTable("topics");
    }
}
