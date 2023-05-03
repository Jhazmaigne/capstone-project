<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPersonnel extends Migration
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
            "first_name" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "last_name" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "middle_name" => [
                "type" => "VARCHAR",
                "constraint" => 255,
                "null" => true,
            ],
            "position_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "user_id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey("id", true);
        $this->forge->addForeignKey("position_id", "positions", "id", "NULL", "NULL");
        $this->forge->addForeignKey("user_id", "users", "id", "CASCADE", "CASCADE");
        $this->forge->createTable("personnels");
    }

    public function down()
    {
        $this->forge->dropTable("personnels");
    }
}
