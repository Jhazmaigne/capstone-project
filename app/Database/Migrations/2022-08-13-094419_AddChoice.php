<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddChoice extends Migration
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
            "question_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "is_correct" => [
                "type" => "INT",
                "constraint" => 1,
                "default" => 0,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("question_id", "questions", "id", "CASCADE", "CASCADE");
        $this->forge->createTable("choices");
    }

    public function down()
    {
        $this->forge->dropTable("choices");
    }
}
