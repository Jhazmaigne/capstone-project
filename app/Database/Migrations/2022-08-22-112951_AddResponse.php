<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddResponse extends Migration
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
            "questionnaire_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "personnel_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("questionnaire_id", "questionnaires", "id", "CASCADE", "CASCADE");
        $this->forge->addForeignKey("personnel_id", "personnels", "id", "CASCADE", "CASCADE");
        $this->forge->createTable("responses");
    }

    public function down()
    {
        $this->forge->dropTable("responses");
    }
}
