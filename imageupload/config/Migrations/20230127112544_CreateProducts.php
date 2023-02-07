<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProducts extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('products');
      
        $table->addColumn("name", "string", [
            "limit" => 150
        ]);
        $table->addColumn("description", "text", [
            "null" => true
        ]);
        $table->addColumn("image", "string", [
            "limit" => 250,
            "null" => true
        ]);
        $table->addColumn("cost", "integer", [
            "limit" => 5
        ]);
        $table->create();
    }
}
