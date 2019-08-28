<?php

use Phinx\Migration\AbstractMigration;

class PasswordReset extends AbstractMigration
{

    public function up()
    {
        $exists = $this->hasTable('password_reset');
        if (!$exists) {
            $table = $this->table('password_reset', ['id' => false, 'primary_key' => 'id']);
            $table->addColumn('id', 'biginteger')
                ->addColumn('email', 'string', ['limit' => 255])
                ->addColumn('token', 'string', ['limit' => 255])
                ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->save();
        }
    }

    public function down()
    {
        $this->dropTable('password_reset');
    }
}
