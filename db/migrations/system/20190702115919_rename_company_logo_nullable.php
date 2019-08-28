<?php

use Phinx\Migration\AbstractMigration;

class RenameCompanyLogoNullable extends AbstractMigration
{

    public function change()
    {
        $company = $this->table('company');
        $company->changeColumn('logo', 'string', ['null' => true])
            ->save();
    }
}
