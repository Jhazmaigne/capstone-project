<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddQuestion extends Migration
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
            "description" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "questionnaire_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("questionnaire_id", "questionnaires", "id", "CASCADE", "CASCADE");
        $this->forge->createTable("questions");
    }

    public function down()
    {
        $this->forge->dropTable("questions");
    }
}
