<?php

use Phinx\Migration\AbstractMigration;

class Company extends AbstractMigration
{

    public function up()
    {
        $exists = $this->hasTable('company');
        if (!$exists) {
            $table = $this->table('company', ['id' => false, 'primary_key' => 'id']);
            $table->addColumn('id', 'biginteger')
                ->addColumn('logo', 'string', ['null' => true, 'limit' => 45])
                ->addColumn('business_name', 'string', ['limit' => 255])
                ->addColumn('fantasy_business_name', 'string', ['null' => true, 'limit' => 255])
                ->addColumn('cnpj', 'string', ['limit' => 20])
                ->addColumn('state_registration', 'string', ['null' => true, 'limit' => 45])
                ->addColumn('opening_date', 'date', ['null' => true])
                ->addColumn('website', 'string', ['null' => true, 'limit' => 45])
                ->addColumn('email', 'string', ['null' => true, 'limit' => 100])
                ->addColumn('zipcode', 'char', ['null' => true, 'limit' => 9])
                ->addColumn('address', 'string', ['null' => true, 'limit' => 255])
                ->addColumn('number', 'string', ['limit' => 255, 'null' => true])
                ->addColumn('neighborhood', 'string', ['null' => true, 'limit' => 255])
                ->addColumn('city', 'string', ['null' => true, 'limit' => 255])
                ->addColumn('state', 'char', ['null' => true, 'limit' => 2])
                ->addColumn('phone', 'string', ['limit' => 14])
                ->addColumn('cellphone', 'string', ['null' => true, 'limit' => 14])
                ->addColumn('user_id', 'biginteger')
                ->addColumn('status', 'char', ['limit' => 1])
                ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addColumn('updated', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addForeignKey('user_id', 'system_user', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->save();
        }
    }

    public function down()
    {
        $this->dropTable('company');
    }
}
