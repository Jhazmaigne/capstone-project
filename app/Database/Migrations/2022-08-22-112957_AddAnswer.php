<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAnswer extends Migration
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
            "response_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "question_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "choice_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("response_id", "responses", "id", "CASCADE", "CASCADE");
        $this->forge->addForeignKey("question_id", "questions", "id", "CASCADE", "CASCADE");
        $this->forge->addForeignKey("choice_id", "choices", "id", "CASCADE", "CASCADE");
        $this->forge->createTable("answers");
    }

    public function down()
    {
        $this->forge->dropTable("answers");
    }
}
