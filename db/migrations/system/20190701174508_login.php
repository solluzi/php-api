<?php

use Phinx\Migration\AbstractMigration;

class Login extends AbstractMigration
{

    public function up()
    {
        $exists = $this->hasTable('user_login');
        if (!$exists) {
            $table = $this->table('user_login', ['id' => false, 'primary_key' => 'id']);
            $table->addColumn('id', 'biginteger')
                ->addColumn('user_id', 'biginteger')
                ->addColumn('company_id', 'biginteger')
                ->addColumn('password', 'string', ['limit' => 255])
                ->addColumn('status', 'char', ['limit' => 1])
                ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addColumn('updated', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addForeignKey('user_id', 'system_user', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->addForeignKey('company_id', 'company', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->save();
        }
    }

    public function down()
    {
        $this->dropTable('user_login');
    }
}
