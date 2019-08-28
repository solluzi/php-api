<?php

use Phinx\Migration\AbstractMigration;

class Navigation extends AbstractMigration
{

    public function up()
    {
        $exists = $this->hasTable('navigation');
        if (!$exists) {
            $table = $this->table('navigation', ['id' => false, 'primary_key' => 'id']);
            $table->addColumn('id', 'biginteger')
                ->addColumn('parent_id', 'biginteger')
                ->addColumn('name', 'string', ['limit' => 200])
                ->addColumn('url', 'string', ['limit' => 100])
                ->addColumn('icon', 'string', ['null' => true, 'limit' => 45])
                ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addColumn('updated', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addForeignKey('parent_id', 'navigation', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->save();
        }
    }

    public function down()
    {
        $this->dropTable('navigation');
    }
}
