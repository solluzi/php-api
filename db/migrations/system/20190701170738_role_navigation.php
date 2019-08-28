<?php

use Phinx\Migration\AbstractMigration;

class RoleNavigation extends AbstractMigration
{

    public function up()
    {
        $exists = $this->hasTable('role_navigation');
        if (!$exists) {
            $table = $this->table('role_navigation', ['id' => false, 'primary_key' => 'id']);
            $table->addColumn('id', 'biginteger')
                ->addColumn('company_id', 'biginteger')
                ->addColumn('user_id', 'biginteger')
                ->addColumn('role_id', 'biginteger')
                ->addColumn('navigation_id', 'biginteger')
                ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addColumn('updated', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])

                ->addForeignKey('company_id', 'company', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->addForeignKey('user_id', 'system_user', 'id', ['delete' => 'SET_NULL', 'update' => 'CASCADE'])
                ->addForeignKey('role_id', 'role', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->addForeignKey('navigation_id', 'navigation', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->save();
        }
    }

    public function down()
    {
        $this->dropTable('role_navigation');
    }
}
