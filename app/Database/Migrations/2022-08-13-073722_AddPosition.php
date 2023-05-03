<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPosition extends Migration
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
            "name" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey("id", true);
        $this->forge->createTable("positions");
    }

    public function down()
    {
        $this->forge->dropTable("positions");
    }
}
