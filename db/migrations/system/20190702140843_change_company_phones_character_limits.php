<?php

use Phinx\Migration\AbstractMigration;

class ChangeCompanyPhonesCharacterLimits extends AbstractMigration
{

    public function change()
    {
        $company = $this->table('company');
        $company->changeColumn('phone', 'string', ['null' => true, 'limit' => 15])
            ->renameColumn('phone', 'phone_1')
            ->changeColumn('cellphone', 'string', ['null' => true, 'limit' => 15])
            ->renameColumn('cellphone', 'phone_2')
            ->save();
    }
}
