<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTraining extends Migration
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
            "status" => [
                "type"       => "ENUM",
                "constraint" => ["draft", "ongoing", "done", "cancel"],
                "default"    => "draft",
            ],
            "topic" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "venue" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "place" => [
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
            "facilitator_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "code" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("speaker_id", "personnels", "id", "NULL", "NULL");
        $this->forge->addForeignKey("facilitator_id", "personnels", "id", "NULL", "NULL");
        $this->forge->createTable("trainings");
    }

    public function down()
    {
        $this->forge->dropTable("trainings");
    }
}
