<?php

use Phinx\Migration\AbstractMigration;

class Base extends AbstractMigration
{
    public function change()
    {
        $this->table('type', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 30])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->create();

        $this->table('platform', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 30])
            ->addColumn('name', 'string', ['limit' => 50])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->create();

        $this->table('metric', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 30])
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('type', 'string', ['limit' => 30])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->addForeignKey('type', 'type', 'id', ['update' => 'RESTRICT', 'delete' => 'CASCADE'])
            ->create();

        $this->table('entity', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 30])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->create();

        $this->table('report', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 50])
            ->addColumn('dimensions', 'jsonb', ['null' => true])
            ->addColumn('filters', 'jsonb', ['null' => true])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->create();

        $this->table('metric_source', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'string', ['limit' => 30])
            ->addColumn('metric', 'string', ['limit' => 30])
            ->addColumn('entity', 'string', ['limit' => 30])
            ->addColumn('platform', 'string', ['limit' => 30])
            ->addColumn('fields', 'jsonb')
            ->addColumn('report', 'string', ['limit' => 50, 'default' => 'GENERIC'])
            ->addColumn('creation', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'timezone' => true])
            ->addForeignKey('report', 'report', 'id', ['update' => 'RESTRICT', 'delete' => 'CASCADE'])
            ->addForeignKey('metric', 'metric', 'id', ['update' => 'RESTRICT', 'delete' => 'CASCADE'])
            ->addForeignKey('entity', 'entity', 'id', ['update' => 'RESTRICT', 'delete' => 'CASCADE'])
            ->addForeignKey('platform', 'platform', 'id', ['update' => 'RESTRICT', 'delete' => 'CASCADE'])
            ->addIndex(['metric', 'entity', 'platform'], ['unique' => true])
            ->create();
    }
}
