<?php

use Phinx\Migration\AbstractMigration;

class Metrics extends AbstractMigration
{
    public function change()
    {
        $this->table('platform', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 30])
            ->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->create();

        $this->table('metric', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 20])
            ->addColumn('name', 'string', ['limit' => 30])
            ->addColumn('platform', 'string', ['limit' => 30])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->addForeignKey('platform', 'platform', 'id', ['update' => 'RESTRICT', 'delete' => 'CASCADE'])
            ->addIndex(['name', 'platform'], ['unique' => true])
            ->create();
    }
}
