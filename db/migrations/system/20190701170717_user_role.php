<?php

use Phinx\Migration\AbstractMigration;

class UserRole extends AbstractMigration
{

    public function up()
    {
        $exists = $this->hasTable('user_role');
        if (!$exists) {
            $table = $this->table('user_role', ['id' => false, 'primary_key' => 'id']);
            $table->addColumn('id', 'biginteger')
                ->addColumn('company_id', 'biginteger')
                ->addColumn('user_id', 'biginteger')
                ->addColumn('role_id', 'biginteger')
                ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addColumn('updated', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])

                ->addForeignKey('company_id', 'company', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->addForeignKey('user_id', 'system_user', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->addForeignKey('role_id', 'role', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->save();
        }
    }

    public function down()
    {
        $this->dropTable('user_role');
    }
}
