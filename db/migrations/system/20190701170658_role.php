<?php

use Phinx\Migration\AbstractMigration;

class Role extends AbstractMigration
{

    public function up()
    {
        $exists = $this->hasTable('role');
        if (!$exists) {
            $table = $this->table('role', ['id' => false, 'primary_key' => 'id']);
            $table->addColumn('id', 'biginteger')
                ->addColumn('company_id', 'biginteger')
                ->addColumn('user_id', 'biginteger')
                ->addColumn('name', 'string', ['limit' => 20])
                ->addColumn('description', 'text')
                ->addColumn('status', 'char', ['limit' => 1])
                ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addColumn('updated', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])

                ->addForeignKey('company_id', 'company', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->addForeignKey('user_id', 'system_user', 'id', ['delete' => 'SET_NULL', 'update' => 'CASCADE'])
                ->save();
        }
    }

    public function down()
    {
        $this->dropTable('role');
    }
}
