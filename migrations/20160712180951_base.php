<?php

use Phinx\Migration\AbstractMigration;

class Base extends AbstractMigration
{
    public function change()
    {
        $this->table('platform', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 30])
            ->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->create();

        $this->table('metric', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 30])
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('platform', 'string', ['limit' => 30, 'null' => true])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->addColumn('super_metric', 'string', ['limit' => 30, 'null' => true])
            ->addForeignKey('platform', 'platform', 'id', ['update' => 'RESTRICT', 'delete' => 'CASCADE'])
            ->addForeignKey('super_metric', 'metric', 'id', ['update' => 'RESTRICT', 'delete' => 'SET_NULL'])
            ->create();

        $this->table('entity', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 30])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->create();

        $this->table('metric_entity', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 30])
            ->addColumn('metric', 'string', ['limit' => 30])
            ->addColumn('entity', 'string', ['limit' => 30])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->addForeignKey('metric', 'metric', 'id', ['update' => 'RESTRICT', 'delete' => 'CASCADE'])
            ->addForeignKey('entity', 'entity', 'id', ['update' => 'RESTRICT', 'delete' => 'CASCADE'])
            ->addIndex(['metric', 'entity'], ['unique' => true])
            ->create();
    }
}
